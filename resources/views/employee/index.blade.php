@extends('layouts.header')

@section('content')
	<form>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{ session()->get('success') }}
		    </div>
		@endif

		<table border="1" align="center">
  			<thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Address</th>
			      <th scope="col">Contact No</th>
			      <th scope="col">Customer Name</th>
			      <th scope="col">Action</th>
			    </tr>
  			</thead>
  			<tbody>
  				@foreach($employee as $emp)

  				
				    <tr>
				      <td>{{$loop->index+1}}</td>
				      <td>{{$emp->name }}</td>
				      <td>{{$emp->email}}</td>
				      <td>{{$emp->address}}</td>
					  <td>{{$emp->contact_no}}</td>
				      <td>{{$emp->customer->name}}</td>
				      <td><a href="{{route('employee.edit',$emp->id)}}" class="btn btn-success">Edit</a><a href="{{route('employee.delete',$emp->id)}}" onclick="return confirm('Are You Sure You want To Remove This Record')" class="btn btn-danger">Delete</a></td>
				    </tr>
				    @endforeach
  			</tbody>
	</table>
</form>
@endsection



  
