	@extends('backend/master')
	@section('content')
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

<div class="row">
    <div class="col-sm-5">
        <form method="post" action="{{route('jamaah.update', $jamaah->id)}}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$jamaah->name}}">
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
                            <select class="custom-select @error('gender') is-invalid @enderror" name="gender" >
                            	<option value="{{$jamaah->gender}}">{{$jamaah->gender}}</option>
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
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$jamaah->phone}}">
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
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$jamaah->address}}">
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
                            <input type="text" m class="form-control @error('latt') is-invalid @enderror" id="latt" name="latt" value="{{$jamaah->latt}}">
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
                            <input type="text" class="form-control @error('long') is-invalid @enderror" id="long" name="long" value="{{$jamaah->long}}">
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
                <label>Address on maps</label>
                <body >
                    <div id="map" style="width:100%; height:250px"></div>
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
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZHluYXRpYyIsImEiOiJja2JpcnpyaHQwaTcwMnNsdHZweTc2eXQ0In0.2dDt6graznsFCKEN64n1ZQ';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [112.60905970968918,-7.898348386333325], // starting position
        zoom: 15 // starting zoom
    });
    var marker = new mapboxgl.Marker();
    map.on('click', function(e) {
        
        //document.getElementById('info').innerHTML = JSON.stringify(e.lngLat);
        document.getElementById('latt').value = e.lngLat.lat;
        document.getElementById('long').value = e.lngLat.lng;
        var latt = e.lngLat.lat;
        var long = e.lngLat.lng;

        marker.setLngLat([long, latt]).addTo(map);
    });
</script>
	@endsection