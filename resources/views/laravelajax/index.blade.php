@extends('layouts.header')

@section('content')
<body>
	<form id="frm" method="post">
		@csrf
		
		<!-- @if(session()->has('success'))
		    <div class="alert alert-success">
		        {{ session()->get('success') }}
		    </div>
		@endif -->
		<div class="container">
			
			<h1>Crud Operation</h1>
			<div>
				<lable>First Name</lable>
				<input type="text" name="fname" id="f_name">
			</div>
			<div>
				<lable>Last Name</lable>
				<input type="text" name="lname" id="l_name">
			</div>
			<div>
				<button name="submit" id="btn">Insert</button>
			</div>
			<!-- <div class="table-responsive">
				<table class="table table-striped" border="1" id="user_table">
					<thead>
						<tr>
							<th>No</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div> -->
</div>
</form>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#btn').click(function(e){

			e.preventDefault();
			var fname=$("#f_name").val();
			var lname=$("#l_name").val();
			var submit=$("#btn").val();
			var data={'f_name':fname,'l_name':lname,'submit':submit};
			$.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
			
			$.ajax({
				type:"POST",
				url:"/laravelajax/store",
				data:data,
				cache: false,
				success:function(data){
						$('#frm')[0].reset();
						alert("Record Inserted Successfully...");
						
					}

			});
		});
	});
</script>
@endsection
