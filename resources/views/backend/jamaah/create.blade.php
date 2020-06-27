@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Jamaah / Tambah')
@section('content')
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

<div class="row">
    <div class="col-sm-5">
        <form method="post" action="{{route('jamaah.store')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama">
                            @error('nama')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="custom-select @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin">
                                <option selected disabled value="">Pilih</option>
                                <option value="1">Laki-laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                            @error('jenisKelamin')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Telephone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="Telephone">
                            @error('telephone')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">
                            @error('alamat')
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
                <label>Alamat pada peta</label>
                <body >
                    <div id="map" style="width:100%; height:250px"></div>
                </body>
            </div>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <a href="{{route('jamaah.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
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