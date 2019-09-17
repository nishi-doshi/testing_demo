@extends('layouts.header')

@section('content')
	<!--  @if ($errors->any())
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
		
	<form id="frm" action="{{route('role.store')}}" enctype="multipart/form-data" method="post">
		@csrf
		<div>
			<h1 align="center">Role Details</h1>
			<table align="center">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" autocomplete="off" placeholder="Enter Name">
					<span class="err">{{$errors->first('name')}}</span></td>
				</tr>
				<tr>
					<td>customer Id</td>
					<td><input type="text" name="customer_id" autocomplete="off" placeholder="Enter Customer Id"></td>
				</tr>
				<tr>
					<td>Customer Image</td>
					<td><input type="file" name="img" autocomplete="off"></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-success" name="submit"></td>
				</tr>
	</table>
</div>
</form>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
</script> -->
@endsection