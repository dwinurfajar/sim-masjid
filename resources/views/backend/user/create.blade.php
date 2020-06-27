@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Users / Tambah')
@section('content')
<div>
	<form class="col" method="post" action="{{ route('users.store') }}">
		@csrf
		<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Nama</label>
	    	<div class="col">
	      		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
	      		@error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Email</label>
	    	<div class="col">
	      		<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
	      		@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Role</label>
	    	<div class="col">
	      		<select name="admin" class="form-control @error('admin') is-invalid @enderror">
			        <option selected disabled value="">Pilih</option>
	                <option value="1">Admin</option>
	                <option value="0">User</option>
			        @error('admin')
                    	<span class="invalid-feedback" role="alert">
                        	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
			     </select>
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Password</label>
	    	<div class="col">
	      		<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
	      		@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Konfirmasi Password</label>
	    	<div class="col">
	      		<input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
	      		@error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="row">
		    <div class="col text-center">
		        <a href="{{route('users.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
		        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
		    </div>  
		</div>
	  	
	</form>
</div>
@endsection