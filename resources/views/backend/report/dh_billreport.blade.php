@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')
	        <div class="col-10 pt-5 ">
	        	<div class="col-md-12">
	        		<h2>All Domain & Hosting bill report</h2>

	        		<table class="table table-striped">
	        			<thead>
	        				<tr>
	        					<th>Sl. no</th>
	        					<th>Client Name</th>
	        					<th>Client Number</th>
	        					<th>Business Name</th>
	        					<th>Address</th>
	        					<th>Billing Month</th>
	        					<th>Bill Recived Date</th>
	        					<th>Bill Amount</th>
	        					<th>Action</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				@foreach($dhBilles as $bill)
	        					<tr>
	        						<td>{{$bill->id}}</td>
	        						<td>{{$bill->client_name}}</td>
	        						<td>{{$bill->contact_number}}</td>
	        						<td>{{$bill->business_name}}</td>
	        						<td>{{$bill->client_address}}</td>
	        						<td>{{$bill->bill_gen_date ?? "Current"}}</td>
	        						<td>{{$bill->bill_pay_date}}</td>
	        						<td>{{$bill->bill_amount}}</td>
	        						<td><button class="btn btn-outline-danger" onclick="deleteDHbill({{$bill->id}})">Delete</button></td>
	        					</tr>
	        				@endforeach
	        			</tbody>
	        		</table>
	        		<div class="d-flex justify-content-center">
	        			{!! $dhBilles->links() !!}
			        </div>
	        	</div>
	        </div>
	    </div>
	</div>

@endsection




@section('site-js')
	<script>
		function deleteDHbill(id){
			const confirms = confirm("Do you want to delete this bill?");

			if(confirms){
				axios.post('/deletedhbills', {bill_id: id})
				.then((res) => {
					if(res.status = 200){
						window.location.reload();
					}
				})
				.catch((e) => {
					console.log(e);
				})
			} 
		}
	</script>
@endsection