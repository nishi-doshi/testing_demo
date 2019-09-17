@extends('layouts.header')

@section('content')

	<form>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{ session()->get('success') }}
		    </div>
		@endif
		
	<table class="table table-striped" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Contact No</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customer as $cust)
			<tr>
				<td>{{$loop->index+1}}</td>
				<td>{{$cust->name }}</td>
				<td>{{$cust->email}}</td>
				<td>{{$cust->address}}</td>
				<td>{{$cust->contact_no}}</td>
				<td><a href="{{route('customer.edit',$cust->id)}}" class="btn btn-success">Edit</a><a href="{{route('customer.delete',$cust->id)}}" onclick="return confirm('Are You Sure You want To Remove This Record')" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
