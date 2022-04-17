@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')
	        <div class="col-10 pt-5 ">
	        	<div class="col-md-10">
	        		<h2>All Domain & Hosting bill report</h2>

	        		<table class="table table-striped">
	        			<thead>
	        				<tr>
	        					<th>Sl. no</th>
	        					<th>Client Name</th>
	        					<th>Client Number</th>
	        					<th>Business Name</th>
	        					<th>Address</th>
	        					<th>Bill pay Month</th>
	        					<th>Bill pay date</th>
	        					<th>Bill Amount</th>
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
	        					</tr>
	        				@endforeach
	        			</tbody>
	        		</table>
	        	</div>
	        </div>
	    </div>
	</div>

@endsection