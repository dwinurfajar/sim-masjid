@extends('backend/master')
@section('content')
	<table class="table" style="width: 600px;">
	  <thead>
	    <tr>
	      <th scope="col" colspan="3">{{$user->name}} profile's</th>

	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td style="width: 15%;">Username</td>
	      <td style="width: 40%;">
	      	{{$user->name}}
	      	<form style="display: none;" id="name" method="post" action="{{route('user.update', $user->id)}}">
	      		@csrf
	      		@method('PATCH')
	      		<input   type="text" name="name" value="{{$user->name}}">
	      		<label class="small">Enter for submit</label>
	      	</form>
	      </td>
	      <td style="width: 10%;"><a href="javascript:void(0)" onclick="myFunctionName()"><i class="fas fa-edit"></i></a>
	      </td>
	    </tr>
	    <tr>
	      <td>Email</td>
	      <td>
	      	{{$user->email}}
	      	<form style="display: none;" id="email" method="post" action="/dashboard">
	      		@csrf
	      		<input   type="email" name="email" value="{{$user->email}}">
	      		<label class="small">Enter for submit</label>
	      	</form>
	      </td>
	      <td style="width: 10%;"><a href="javascript:void(0)" onclick="myFunctionEmail()"><i class="fas fa-edit"></i></a>
	    </tr>
	    <tr>
	      <td>Role</td>
	      <td><?php 
                                $isAdmin = Auth::user()->admin ; 
                            ?>
                            @if($isAdmin == 1 )
                                Admin
                            @else
                            	User
                            @endif</td>
	      <td></td>
	    </tr>
	    <tr>
	      <td>Password</td>
	      <td>
	      	Not show
	      	<form style="display: none;" id="password" method="post" action="{{ route('change.password') }}">
	      		@csrf
	      		<input class="mb-1" type="password" name="new_password" placeholder="New Password">
	      		<input class="mb-1" type="password" name="new_confirm_password" placeholder="Confirm Password">
	      		<input class="mb-1" type="password" name="current_password" placeholder="Current Password">
	      		<button type="submit" class="badge badge-primary">Change Password</button>
	      	</form>
	      </td>
	      <td style="width: 10%;"><a href="javascript:void(0)" onclick="myFunctionPassword()"><i class="fas fa-edit"></i></a>
	    </tr>
	  </tbody>
	</table>

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