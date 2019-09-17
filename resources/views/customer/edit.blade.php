@extends('layouts.header')

@section('content')

	<div class="pull-left">
		<a href="{{route('customer.index')}}" class="btn btn-primary">Back</a>
	</div>
		
	<form action="{{route('customer.update',$customer->id)}}" method="post">
		@csrf
		  {{ method_field('PUT') }}
    			<!-- {{ csrf_field() }} -->
		<div>
			<h1 align="center">Customer Details</h1>
			<table align="center">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" autocomplete="off" value="{{$customer->name}}" placeholder="Enter Name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="{{$customer->email}}" placeholder="Enter Email"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea cols="21" name="address" autocomplete="off" placeholder="Enter Address">{{$customer->address}}</textarea></td>
				</tr>
				<tr>
					<td>Contact No</td>
					<td><input type="text" name="cno" autocomplete="off" value="{{$customer->contact_no}}" placeholder="Enter Mobile No"></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-success" name="submit" value="Update"></td>
				</tr>
	</table>
</div>
</form>
@endsection