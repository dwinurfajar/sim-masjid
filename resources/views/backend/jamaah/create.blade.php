@extends('backend/master')
@section('content')
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<!--<script src="https://maps.googleapis.com/maps/api/js?key=[YOUR_KEY]&callback=initMap"
    async defer></script> -->
<script type="text/javascript"> 

  var map;
  var marker;
  var overlay;

  function initialize() { 
    var latlng = new google.maps.LatLng(-7.898699, 112.608776); 
    var myOptions = { 
      zoom: 17, 
      center: latlng, 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }; 
    
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

    google.maps.event.addListener(map, 'click', function(event) { 
      placeMarker(event.latLng); 
    }); 

    overlay = new google.maps.OverlayView();
    overlay.draw = function() {};
    overlay.setMap(map);
  } 

  function placeMarker(location) { 

    if (marker != null) {
      marker.setMap(null);
    }

    marker = new google.maps.Marker({ 
        position: location,  
        map: map 
    }); 

    var mapType        = map.mapTypes[map.getMapTypeId()];

    var mapPixel       = mapType.projection.fromLatLngToPoint(location);
    var containerPixel = overlay.getProjection().fromLatLngToContainerPixel(location);
    var divPixel       = overlay.getProjection().fromLatLngToDivPixel(location); 

    /*document.getElementById("info").innerHTML = "<table>" +
                          "<tr><td>LatLng</td><td>" + location.lat() + ","+ location.lng() + "</td></tr>" +
                          "<tr><td>Zoom</td><td>" + map.getZoom() + "</td>,</tr>" + 
                          "<tr><td>Mercator</td><td>" + mapPixel.x + "," + mapPixel.y + "</td></tr>" + 
                          "<tr><td>Container</td><td>" + containerPixel.x + "," + containerPixel.y + "</td></tr>" +
                          "<tr><td>Div</td><td>" + divPixel.x + "," + divPixel.y + "</td></tr></table>";
    */
    document.getElementById("latt").value = location.lat();
    document.getElementById("long").value = location.lng();
  }
 
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWe9SB74omaI4ptZ5c9Jph2kiSekvbmyU&callback=initMap"
  type="text/javascript"></script>

<div class="row">
    <div class="col-sm-5">
        <form method="post" action="{{route('jamaah.store')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
                            @error('name')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <select class="custom-select @error('gender') is-invalid @enderror" name="gender">
                                <option selected disabled value="">Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone">
                            @error('phone')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">
                            @error('address')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Lattitude</label>
                        <div class="col-sm-8">
                            <input type="text" m class="form-control @error('latt') is-invalid @enderror" id="latt" name="latt" placeholder="Lattitude">
                            @error('latt')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Longitude</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('long') is-invalid @enderror" id="long" name="long" placeholder="Longitude">
                            @error('long')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>

                </div>
                
             </div>      
        
    </div>
    <div class="col-sm-7">
        <div>
            <div class="form-group" >
                <label for="exampleFormControlInput1">Alamat pada peta</label>
                <body onload="initialize()" class="mt-1">
                    <div id="map_canvas" style="width:100%; height:250px"></div>
                    <div id="info" style="width:512px"></div>
                </body>
            </div>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <a href="{{route('jamaah.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Cancel</a>
        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Save</button>
        </form>
    </div>  
</div>
@endsection