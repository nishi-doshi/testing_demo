@extends('layouts.header')

@section('content')
		
	<form action="{{route('employee.update',$employee->id)}}" method="post">
		@csrf
		 <!-- {{ method_field('post') }} -->
    			<!-- {{ csrf_field() }} -->
		<div>
			<h1 align="center">Employee Details</h1>
			<table align="center">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" autocomplete="off" value="{{$employee->name}}" placeholder="Enter Name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="{{$employee->email}}" placeholder="Enter Email"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea cols="21" name="address" autocomplete="off" placeholder="Enter Address">{{$employee->address}}</textarea></td>
				</tr>
				<tr>
					<td>Contact No</td>
					<td><input type="text" name="cno" autocomplete="off" value="{{$employee->contact_no}}" placeholder="Enter Mobile No"></td>
				</tr>
				<tr>
				  <td>Employee Name</td>
				  <td><select name="cid">
				    <option value="">Select Employee Name</option>
				   @foreach($customer as $cust)
				   	<option value="{{$cust->id}}">{{ $cust->name}}</option>
				   @endforeach
				  </select></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-success" name="submit" value="Update"></td>
				</tr>
	</table>
</div>
</form>
@endsection