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
                        <label for="inputPassword" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$jamaah->nama}}">
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
                            <select class="custom-select @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin" >
                            	<option value="{{$jamaah->jenisKelamin}}">
                                    <?php $jenisKelamin = $jamaah->jenisKelamin ; ?>
                                    @if($jenisKelamin == 1 )
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </option>
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
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{$jamaah->telephone}}">
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
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$jamaah->alamat}}">
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
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Jamaah Aktif</label>
                        <div class="col-sm-8">
                            <select class="custom-select @error('aktif') is-invalid @enderror" name="aktif" >
                                <option value="{{$jamaah->aktif}}">
                                    <?php $aktif = $jamaah->aktif ; ?>
                                    @if($aktif == 1 )
                                        Aktif
                                    @else
                                        Pasif
                                    @endif
                                </option>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                            @error('aktif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Penerima Zakat</label>
                        <div class="col-sm-8">
                            <select class="custom-select @error('zakat') is-invalid @enderror" name="zakat" >
                                <option selected value="{{$jamaah->zakat}}">
                                    <?php $zakat = $jamaah->zakat ; ?>
                                    @if($zakat == 1 )
                                        Iya
                                    @else
                                        Tidak
                                    @endif
                                </option>
                                <option value="1">Iya</option>
                                <option value="0">Tidak</option>
                            </select>
                            @error('zakat')
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
                    <div id="map" style="width:100%; height:325px"></div>
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
        zoom: 14 // starting zoom
    });
    var marker = new mapboxgl.Marker();

    <?php $latt = $jamaah->latt; $long = $jamaah->long ?>
    var latt1 = '<?php echo($latt)?>'
    var long1 = '<?php echo($long)?>'
    var marker1 = new mapboxgl.Marker().setLngLat([long1, latt1]).addTo(map);

    map.on('click', function(e) {
        document.getElementById('latt').value = e.lngLat.lat;
        document.getElementById('long').value = e.lngLat.lng;
        var latt = e.lngLat.lat;
        var long = e.lngLat.lng;
        marker.setLngLat([long, latt]).addTo(map);
    });
</script>
	@endsection