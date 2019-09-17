@extends('layouts.header')

@section('content')
	 <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                   	 @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif -->

		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{ session()->get('success') }}
		    </div>
		@endif
		
		
		<div class="pull-left">
			<a href="{{route('customer.index')}}" class="btn btn-primary">Back</a>
		</div>
		
	<form id="frm" action="{{route('customer.store')}}" method="post">
		@csrf
		<div>
			<h1 align="center">Customer Details</h1>
			<table align="center">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" autocomplete="off" placeholder="Enter Name">
					<span class="err">{{$errors->first('name')}}</span></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" autocomplete="off" placeholder="Enter Email">
						<span class="err">{{$errors->first('email')}}</span></td>

				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" autocomplete="off" placeholder="Enter password">
						<span class="err">{{$errors->first('password')}}</span></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea cols="21" name="address" autocomplete="off" placeholder="Enter Address"></textarea><span class="err">{{$errors->first('address')}}</span></td>
				</tr>
				<tr>
					<td>Contact No</td>
					<td><input type="text" name="cno" autocomplete="off" placeholder="Enter Mobile No">
						<span class="err">{{$errors->first('cno')}}</span></td>

				</tr>
				<tr>
					<td><input type="submit" class="btn btn-success" name="submit"></td>
				</tr>
	</table>
</div>
</form>
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#frm').submit(function(e){
		e.preventDefault();
		var email = $('#email').val();

		$(".err").remove();
		if(email.length < 1){
			$("#email").after('<span class="err">This Field is required</span>');
		}
});
});
</script>
 -->
 @endsection