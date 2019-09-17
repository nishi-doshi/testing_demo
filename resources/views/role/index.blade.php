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
				<th>No</th>
				<th>Name</th>
				<th>Customer Name</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
			@if(!empty($role->customer))
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$role->name }}</td>
					<td>{{$role->customer->name}}</td>
					<td><img src="{{asset('upload/gallery/' . $role->image_name)}}" width="80px" height="80px" alt="Image"></td>
					<td><a href="{{route('role.edit',$role->id)}}" class="btn btn-success">Edit</a><a href="{{route('role.delete',$role->id)}}" onclick="return confirm('Are You Sure You Want To Remove This Record')" class="btn btn-danger">Delete</a></td>
				</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</form>
@endsection
