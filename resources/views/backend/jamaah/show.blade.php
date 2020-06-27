	@extends('backend/master')
	@section('title', 'Detail')
	@section('state', '/ Jamaah / Detail')
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
	                        <label class="col-sm-4 col-form-label font-weight-bold">Nama</label>
	                        <label class="col-sm-8 col-form-label">: {{$jamaah->nama}}</label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label  class="col-sm-4 col-form-label font-weight-bold">Jenis Kelamin</label>
	                        <label class="col-sm-8 col-form-label">: 
	                        	<?php $isAdmin = $jamaah->jenisKelamin; ?>
                                      @if($isAdmin == 1 )
                                          Laki-laki
                                      @else
                                          Perempuan
                                      @endif
	                        </label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label  class="col-sm-4 col-form-label font-weight-bold">Telephone</label>
	                        <label class="col-sm-8 col-form-label">: {{$jamaah->telephone}}</label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label  class="col-sm-4 col-form-label font-weight-bold">Alamat</label>
	                        <label class="col-sm-8 col-form-label">: {{$jamaah->alamat}}</label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label class="col-sm-4 col-form-label font-weight-bold">Lattitude</label>
	                        <label class="col-sm-8 col-form-label">: {{$jamaah->latt}}</label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label class="col-sm-4 col-form-label font-weight-bold">Longitude</label>
	                        <label class="col-sm-8 col-form-label">: {{$jamaah->long}}</label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label class="col-sm-4 col-form-label font-weight-bold">Jamaah Aktif</label>
	                        <label class="col-sm-8 col-form-label">: 
	                        	<?php $isAdmin = $jamaah->aktif; ?>
                                      @if($isAdmin == 1 )
                                          Aktif
                                      @else
                                          Pasif
                                      @endif
	                        </label>
	                    </div>
	                    <div class="form-group row mb-2">
	                        <label class="col-sm-4 col-form-label font-weight-bold">Penerima zakat</label>
	                        <label class="col-sm-8 col-form-label">: 
	                        	<?php $isAdmin = $jamaah->zakat; ?>
                                      @if($isAdmin == 1 )
                                          Iya
                                      @else
                                          Tidak
                                      @endif
	                        </label>
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
	<script>
		<?php $latt = $jamaah->latt; $long = $jamaah->long ?>
						var latt = '<?php echo($latt)?>'
						var long = '<?php echo($long)?>'

						mapboxgl.accessToken = 'pk.eyJ1IjoiZHluYXRpYyIsImEiOiJja2JpcnpyaHQwaTcwMnNsdHZweTc2eXQ0In0.2dDt6graznsFCKEN64n1ZQ';
						var map = new mapboxgl.Map({
						container: 'map',
						style: 'mapbox://styles/mapbox/streets-v11',
						center: [112.60905970968918,-7.898348386333325],
						zoom: 14
						});
						 
						var marker = new mapboxgl.Marker()
						.setLngLat([long, latt])
						.addTo(map);
	</script>
	@endsection