@extends('backend/master')
@section('title', 'Profil')
@section('state', '/ Profil')
@section('content')

<div class="row">
	<div class="col-sm-4 text-center">
		<h5>Ketua</h5>
      	<img style="width: 240px; height: 240px; border-radius: 50%" src="/uploads/avatars/foto_ketua" >
      	<div class="">
      	<form enctype="multipart/form-data" method="post" action="{{route('upload.foto')}}">
      		@csrf
	      	<input class="small ml-5 mt-2" type="file" name="foto_ketua" >
	      	@error('foto_ketua')
				<label class="error alert-danger small mt-2">{{ $message }}</label>
			@enderror
	      	<button type="submit" class="badge badge-primary">unggah</button>
	      	
	     </form>
      </div>
      <div class="col mt-2">
      	<form method="post" action="{{route('profil.update', 1)}}">
      		@csrf
      		@method('PATCH')
	      	<input type="text" name="ketua" placeholder="Ketua" value="{{$profil->ketua}}">
	      	<label class="small">Enter for submit</label>
      </form>
      </div>  
    </div>
    <div class="col-sm-4 text-center">
		<h5>Sekretaris</h5>
      	<img style="width: 240px; height: 240px; border-radius: 50%" src="/uploads/avatars/foto_sekretaris" >
      	<div class="">
      	<form enctype="multipart/form-data" method="post" action="{{route('upload.foto')}}">
      		@csrf
	      	<input class="small ml-5 mt-2" type="file" name="foto_sekretaris" >
	      	@error('foto_sekretaris')
				<label class="error alert-danger small mt-2">{{ $message }}</label>
			@enderror
	      	<button type="submit" class="badge badge-primary">unggah</button>
	      	
	     </form>
      </div>
      <div class="col mt-2">
      	<form method="post" action="{{route('profil.update', 1)}}">
      		@csrf
      		@method('PATCH')
	      	<input type="text" name="sekretaris" placeholder="Sekretaris" value="{{$profil->sekretaris}}">
	      	<label class="small">Enter for submit</label>
      </form>
      </div>  
    </div>
    <div class="col-sm-4 text-center">
		<h5>Sekretaris</h5>
      	<img style="width: 240px; height: 240px; border-radius: 50%" src="/uploads/avatars/{{$profil->foto_bendahara}}" >
      	<div class="">
      	<form enctype="multipart/form-data" method="post" action="{{route('upload.foto')}}">
      		@csrf
	      	<input class="small ml-5 mt-2" type="file" name="foto_bendahara" >
	      	@error('foto_bendahara')
				<label class="error alert-danger small mt-2">{{ $message }}</label>
			@enderror
	      	<button type="submit" class="badge badge-primary">unggah</button>
	      	
	     </form>
      </div>
      <div class="col mt-2">
      	<form method="post" action="{{route('profil.update', 1)}}">
      		@csrf
      		@method('PATCH')
	      	<input type="text" name="bendahara" value="{{$profil->bendahara}}">
	      	<label class="small">Enter for submit</label>
      </form>
      </div>  
    </div>
</div>


@endsection