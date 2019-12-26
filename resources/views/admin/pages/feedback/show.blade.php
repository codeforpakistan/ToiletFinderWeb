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
        <h1>Toilet ID: {{ $f->toilet->id }}</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
           li><a href="#"><i class="fa fa-building"></i> Feedback</a></li>
            <li class="active">Toilet Details</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="row">
            <div class="col-md-10 col-mf-offset-1">
                {{-- Toilet Image --}}
                <div class="box box-primary">
                    <div class="box-body box-profile text-center center-block">
                        @if( $f->picture )
                            <img class="responsive-class" src="{{ $f->picture }}" alt="Featured Image" width="500px">
                        @else
                            <img class="responsive-class " src="{{ asset('admin_assets/img/boxed-bg.jpg') }}" alt="Resturant Picture">
                        @endif
                    </div>
                    <h2 class="profile-username text-center"><b>Toilet Address :</b>{{ $f->toilet->address }}</h2>
                    <h2 class="profile-username text-center"><b>Review Added By &nbsp; :</b> &nbsp; {{ $f->name }}</h2>
                    <h2 class="profile-username text-center"><b>Email :</b> &nbsp; {{ $f->email }}</h2>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-justify">
                            <h3 class="text-center"><b>Comments :</b> &nbsp; {!! $f->comments !!}</h3>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-justify">
                            <h3 class="text-center"><b>Review :</b> &nbsp; {!! $f->review !!}</h3>
                        </div>
                        
                    </div>
                    
                    
                        {{-- Map --}}
                        <div class="form-group col-sm-12" id="map_canvas">
                         <div id="map"></div>
                        </div>
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
      var latitude = {{ $f->toilet->latitude }};
      var longitude = {{ $f->toilet->longitude }};
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
        draggable: false
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

   
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
@endsection
