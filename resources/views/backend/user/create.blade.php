@extends('backend/master')
@section('content')
<div>
	<form class="col" method="post" action="{{ route('users.store') }}">
		@csrf
		<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Username</label>
	    	<div class="col">
	      		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
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
	      		<input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
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
			        <option selected value="0">User</option>
			        <option value="1">Admin</option>
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
	      		<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
	      		@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label class="col-sm-3 col-form-label">Confirm Password</label>
	    	<div class="col">
	      		<input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
	      		@error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>
	  	</div>
	  	<div class="text-center">
	  		<button type="button" class="btn btn-danger btn-sm">Cancel</button>
	  		<button type="submit" class="btn btn-primary btn-sm">Save</button>
	  	</div>
	  	
	</form>
</div>
@endsection