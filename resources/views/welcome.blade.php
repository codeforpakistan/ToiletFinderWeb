@include('_partials.header')

    <div id="map" ></div>
    <script>
        var map, myLatLng, infoWindow, startPos, endPos, directionsService, directionsRenderer, mark, activeMarker = null;

        var markers = [
            @foreach($markers as $marker)
            {
                id: "{{ $marker->id }}",
                address: "{{ $marker->address }}",
                city: "{{ $marker->city }}",
                lat: {{ $marker->latitude }},
                lng: {{ $marker->longitude }},
                toilet_available: "{{ $marker->toilet_available }}",
                hand_wash: "{{ $marker->hand_wash }}",
                sanitary_disposal_bin: "{{ $marker->sanitary_disposal_bin }}",
                accessible_physical_challenge: "{{ $marker->accessible_physical_challenge }}",
                parking: "{{ $marker->parking }}",
                payment_required: "{{ $marker->payment_required }}",
                soap: "{{ $marker->soap }}",
                providers: "{{ $marker->providers }}",
            },
            @endforeach
        ];
        var mapMarkers = [];
        function initMap() {
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 34.0151, lng: 71.5249},
                styles: [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}],
                zoom: 13,
                minZoom: 1
            });

            directionsRenderer.setMap(map);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    startPos = {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude
                    };
                    mark = new google.maps.Marker({
                        position: {lat: startPos.latitude, lng: startPos.longitude},
                        map: map
                    });

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
           
            function handleLocationError(browserHasGeolocation, infoWindow, startPos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
            }
            setTimeout(function(){
                markers.forEach( function(element, index) {
                    var url = "/admin/marker/"
                    marker = new google.maps.Marker({
                        position: {lat: element.lat, lng: element.lng},
                        map: map,
                        title: element.name,
                        icon : '{{ asset("admin/img/map-pointer.png") }}'
                    });
                    mapMarkers.push(marker);
                    endPos = {
                        lat: element.lat,
                        lng: element.lng,
                    };
                    console.log(startPos, endPos);
                    var html = '<div>' + '<b>Address :</b>' + element.address + '</div></br>'; 
                    html += '<div><b>Available For :</b>'+ element.toilet_available +'</div></br>';
                    html += '<div><b>Hand Wash :</b>'+ element.hand_wash +'</div>'+'</br>';
                    html += '<div><b>Sanitary Disposal Bin :</b>'+ element.sanitary_disposal_bin +'</div>'+ '</br>';
                    html += '<div><b>Accessible Physical Challenge :</b>'+element.accessible_physical_challenge +'</div>'+'</br>';
                    html += '<div><b>Parking :</b>'+ element.parking+'</div>'+'</br>';
                    html += '<div><b>Payment Required :</b>'+element.payment_required+'</div>'+ '</br>'; 
                    html += '<div><b>Soap :</b>'+element.soap+'</div>';
                    html += '<div><input type="hidden" id="pointA" value="'+startPos.latitude+','+startPos.longitude+'"></div>';
                    html += '<div><input type="hidden" id="pointb" value="'+element.lat+','+element.lng+'"></div>';
                    html += '<div><button type="button" class="btn btn-info btn-block"  id="dirbtn" _targert="bvalue="'+element.id+'" onclick="calculateAndDisplayRoute(directionsService, directionsRenderer,pointA,pointb)"> Get Directions</button></div>';
                    marker['infowindow'] = new google.maps.InfoWindow({
                        content: html
                    });
                    google.maps.event.addListener(marker, 'click', function(ev) {
                        if(activeMarker != null) 
                        {
                            activeMarker['infowindow'].close();
                            activeMarker = null;
                        }
                        this['infowindow'].open(map, this);
                        activeMarker = this;
                    });
                });
            }, 5000);
        }
        function calculateAndDisplayRoute(directionsService, directionsRenderer,pointA,pointb) {
            directionsService.route({
                origin: {query: document.getElementById('pointA').value},
                destination: {query: document.getElementById('pointb').value},
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>   
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script src="https://roads.googleapis.com/v1/snapToRoads?parameters&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap"></script>
    <script src="{{ asset('css/sweetalert.min.js') }}"></script>
    
</body>
</html>