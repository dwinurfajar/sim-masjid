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
	      	<form style="display: none;" id="name" method="post" action="/dashboard">
	      			<input   type="text" name="name" value="{{$user->name}}">
	      			<label class="small">Enter for submit</label>
	      	</form>
	      </td>
	      <td style="width: 10%;"><a href="javascript:void(0)" onclick="myFunctionName()"><i class="fas fa-edit"></i></a>
	      </td>
	    </tr>
	    <tr>
	      <td>Email</td>
	      <td>{{$user->email}}</td>
	      <td><a href=""><i class="fas fa-edit"></i></a></td>
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
	      <td>Not show</td>
	      <td><a href=""><i class="fas fa-edit"></i></a></td>
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
	</script>
@endsection