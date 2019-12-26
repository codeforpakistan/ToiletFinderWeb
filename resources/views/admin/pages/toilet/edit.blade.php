@extends('admin.layouts.app')
@section('stylesheets')
    
    <style>
         #map {
            width: 100%;
            height: 400px;
        }
    </style>
@endsection
@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>Add New Toilet</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>Toilet's</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($toilet, ['route' => ['admin.toilet.update',$toilet->id], 'method' => 'PATCH']) !!}
                        {{ csrf_field() }}
                        
                        {{-- Title --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        
                        {{-- Address --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Address', 'Adress:') !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                       
                       {{-- Latitude --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('latitude', 'Latitude:') !!}
                            <input type="text" name="latitude" class="form-control" id="latitude" value="{{ $toilet->latitude }}" required>
                            
                        </div>

                        {{-- Longitude --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Longitude', 'Longitude:') !!}
                            <input type="text" name="longitude" class="form-control" id="longitude" value="{{ $toilet->longitude }}" required>
                        </div>
                        
                        <a href="#"><b><div id="note" onclick="showmap()" style="text-align: center;">Please Click Me! If you want to add latitude & longitude from Map</div></a></b>
                        {{-- Map --}}
                        <div class="form-group col-sm-12" id="map_canvas" style="display: none">
                            <b style="text-align: center">Please drag the marker to get lat & long</b>
                         <div id="map"></div>

                        </div>

                        {{-- Added By --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('added_by', 'Added By:') !!}
                           {{Form::select("added_by",['watsan_cell' => 'Watsan Cell'], null,
                                         [
                                            "class" => "form-control",
                                            "placeholder" => "Added By"
                                         ])
                            }}
                        </div>

                        {{-- Accessible For Physical Challenge People --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('accessible_physical_challenge', 'Accessible For Physical Challenge Prople:') !!}
                            <br>
                           <input type="radio" name="accessible_physical_challenge" value="Yes" checked > Yes
                            <input type="radio" name="accessible_physical_challenge" value="No" > No

                        </div>

                        
                        {{-- Parking Available --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('parking', 'Parking:') !!}
                            <br>
                           <input type="radio" name="parking" value="Yes" checked > Yes
                            <input type="radio" name="parking" value="No" > No

                        </div>

                        {{-- Sanitary Disposal Bin --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('sanitary_disposal_bin', 'Sanitary Disposal Bin:') !!}
                            <br>
                           <input type="radio" name="sanitary_disposal_bin" value="Yes" checked > Yes
                            <input type="radio" name="sanitary_disposal_bin" value="No" > No

                        </div>
                        
                        {{-- Available Toilets  --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('toilet_available', 'Toilet Available For :') !!}
                            <br>
                           <input type="radio" name="toilet_available" value="male" checked > Male
                            <input type="radio" name="toilet_available" value="female" > Female
                            <input type="radio" name="toilet_available" value="male/female" > Both

                        </div>

                        {{-- Payment Required --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('payment_required', 'Payment Required:') !!}
                            <br>
                           <input type="radio" name="payment_required" value="Yes" checked > Yes
                            <input type="radio" name="payment_required" value="No" > No

                        </div>

                        {{-- Providers --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('providers', 'Providers:') !!}
                           {{Form::select("providers",['pump' => 'Petrol/Gas Station','park' => 'Public Park/funland','others' => 'Others'], null,
                                         [
                                            "class" => "form-control",
                                            "placeholder" => "Providers "
                                         ])
                            }}
                        </div>

                       
                        {{-- Submit Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('admin.toilet.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                        
                </div>
            </div>
        </div>
    </div>

    
    @endsection

@section('scripts')
    
    <script>
var geocoder = new google.maps.Geocoder();
var marker = null;
var map = null;
function initialize() {
      var $latitude = document.getElementById('latitude');
      var $longitude = document.getElementById('longitude');
      var latitude = 34.0151;
      var longitude = 71.5249;
      var zoom = 16;

      var LatLng = new google.maps.LatLng(latitude, longitude);

      var mapOptions = {
        zoom: zoom,
        center: LatLng,
        panControl: false,
        zoomControl: false,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map(document.getElementById('map'), mapOptions);
      if (marker && marker.getMap) marker.setMap(map);
      marker = new google.maps.Marker({
        position: LatLng,
        map: map,
        title: 'Drag Me!',
        draggable: true
      });

      google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        $latitude.value = latLng.lat();
        $longitude.value = latLng.lng();
      });

    }
    initialize();
    $('#findbutton').click(function (e) {
        var address = $("#Postcode").val();
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $(latitude).val(marker.getPosition().lat());
                $(longitude).val(marker.getPosition().lng());
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
    });

    function showmap()
    {
        document.getElementById('note').style.display = 'none';
        document.getElementById('map_canvas').style.display = 'block';
    }


</script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

@endsection

