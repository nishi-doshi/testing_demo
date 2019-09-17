@extends('layouts.header')

@section('content')
	<form action="{{route('role.update',$role->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		 <!-- {{ method_field('post') }} -->
    			<!-- {{ csrf_field() }} -->
		<div>
			<h1 align="center">Role Details</h1>
			<table align="center">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" autocomplete="off" value="{{$role->name}}" placeholder="Enter Name"></td>
				</tr>
				<tr>
				  <td>Role Name</td>
				  <td><select name="cid">
				    <option value="">Select Role Name</option>
				   @foreach($customer as $cust)
				   	<option value="{{$cust->id}}">{{$cust->name}}</option>
				   @endforeach
				  </select></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input type="file" name="image" autocomplete="off" value="{{$role->image_name}}">
					<img src="{{asset('upload/gallery/' . $role->image_name)}}" width="80px" height="80px" alt="Image"></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-success" name="submit" value="Update"></td>
				</tr>
	</table>
</div>
</form>
@endsection