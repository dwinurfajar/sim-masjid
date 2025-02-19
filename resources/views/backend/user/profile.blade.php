@extends('backend/master')
@section('title', 'Profil')
@section('state', '/ Users / Detail')
@section('content')
<div class="fluid-container">
  <div class="row ">
    <div class="col-sm-4 text-center ">
      <img style="width: 240px; height: 240px; border-radius: 50%" src="/uploads/avatars/{{ $user->avatar }}" >
      
    </div>
    <div class="col-sm-8 ">
      <table class="table">
		  <thead>
		    <tr>
		      <th scope="col" colspan="3">Profil {{$user->name}}</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr class="d-flex">
		      <td class="col-3">Nama</td>
		      <td class="col-9">
		      	{{$user->name}}	
		      </td>
		    </tr>
		    <tr class="d-flex">
		      <td class="col-3">Email</td>
		      <td class="col-9">
		      	{{$user->email}}	
		      </td>
		    </tr>
		    <tr class="d-flex">
		      <td class="col-3">Role</td>
		      <td class="col-9"><?php 
	                                $isAdmin = Auth::user()->admin ; 
	                            ?>
	                            @if($isAdmin == 1 )
	                                Admin
	                            @else
	                            	User
	                            @endif</td>
	        </tr>
		    <tr class="d-flex">
		      <td class="col-3">Password</td>
		      <td class="col-9">
		      	Tidak ditampilkan	
		      </td>
		    </tr>
		  </tbody>
		</table>
    </div>
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