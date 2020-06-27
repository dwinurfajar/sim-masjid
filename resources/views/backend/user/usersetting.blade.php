@extends('backend/master')
@section('title', 'Pengaturan')
@section('state', '/ Users / Edit')
@section('content')
  <div class="row">
    <div class="col-sm-3 text-center">
      <img style="width: 240px; height: 240px; border-radius: 50%" src="/uploads/avatars/{{ $user->avatar }}" >
      <div class="">
      	<form enctype="multipart/form-data" method="post" action="{{route('upload.avatar')}}">
      		@csrf
	      	<input class="small ml-5 mt-2" type="file" name="avatar">
	      	<button type="submit" class="badge badge-primary">unggah</button>
	      	@error('avatar')
				<label class="error alert-danger small mt-2">{{ $message }}</label>
			@enderror
	     </form>
      </div>
      
    </div>
    <div class="col-sm">
      <table class="table">
		  <thead>
		    <tr>
		      <th scope="col" colspan="3">Edit profile {{$user->name}}</th>

		    </tr>
		  </thead>
		  <tbody>
		    <tr class="d-flex">
		      <td class="col-3">Nama</td>
		      <td class="col-8">
		      	{{$user->name}}
		      	<form style="display: none;" id="name" method="post" action="{{route('users.update', $user->id)}}">
		      		@csrf
		      		@method('PATCH')
		      		<input style="padding : 5px" class="form-control" type="text" name="name" value="{{$user->name}}">
		      		@error('name')
					    <label class="error alert-danger small mt-2">{{ $message }}</label>
					@enderror
		      		<label class="small">Enter for submit</label>
		      		
		      	</form>
		      </td>
		      <td class="col-1"><a href="javascript:void(0)" onclick="myFunctionName()"><i class="fas fa-edit"></i></a>
		      </td>
		    </tr>
		    <tr class="d-flex">
		      <td class="col-3">Email</td>
		      <td class="col-8">
		      	{{$user->email}}
		      	<form style="display: none;" id="email" method="post" action="{{route('users.update', $user->id)}}">
		      		@csrf
		      		@method('PATCH')
		      		<input style="padding : 5px" class="form-control" type="text" name="email" value="{{$user->email}}">
		      		@error('email')
					    <label class="error alert-danger small mt-2">{{ $message }}</label>
					@enderror
					<label class="small">Enter for submit</label>
		      	</form>
		      </td>
		      <td class="col-1"><a href="javascript:void(0)" onclick="myFunctionEmail()"><i class="fas fa-edit"></i></a>
		    </tr>
		    <tr class="d-flex">
		      <td class="col-3">Role</td>
		      <td class="col-8"><?php 
	                                $isAdmin = $user->admin ; 
	                            ?>
	                            @if($isAdmin == 1 )
	                                Admin
	                            @else
	                            	User
	                            @endif
	                <form style="display: none;" id="admin" method="post" action="{{route('users.update', $user->id)}}">
	                	@csrf
		      			@method('PATCH')
	                	<select class="custom-select mb-1" name="admin" required>
	                        <option selected disabled value="">Pilih</option>
	                        <option value="1">Admin</option>
	                        <option value="0">User</option>
	                    </select>
	                    <button type="submit" class="badge badge-primary">Ubah Role</button>
	                </form>
	            </td>
		      <td class="col-1"><a href="javascript:void(0)" onclick="myFunctionRole()"><i class="fas fa-edit"></i></a>
		    </tr>
		    <tr class="d-flex">
		      <td class="col-3">Password</td>
		      <td class="col-8">
		      	Tidak ditampilkan
		      	<form style="display: none;" id="password" method="post" action="{{ route('users.update', $user->id)}}">
		      		@csrf
		      		@method('PATCH')
		      		<input style="padding : 3px" class="form-control mb-1" type="password" name="password" placeholder="Password Baru">
		      		@error('password')
					    <label class="error alert-danger small mt-2">{{ $message }}</label>
					@enderror
		      		<button type="submit" class="badge badge-primary">Ubah Password</button>
		      	</form>
		      </td>
		      <td class="col-1"><a href="javascript:void(0)" onclick="myFunctionPassword()"><i class="fas fa-edit"></i></a>
		    </tr>
		  </tbody>
		</table>
    </div>
  </div>

	

	<script type="text/javascript">
		function myFunctionName() {
		  var x = document.getElementById("name");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}

		function myFunctionEmail() {
		  var x = document.getElementById("email");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}
		function myFunctionRole() {
		  var x = document.getElementById("admin");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}
		function myFunctionPassword() {
		  var x = document.getElementById("password");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}
	</script>
@endsection