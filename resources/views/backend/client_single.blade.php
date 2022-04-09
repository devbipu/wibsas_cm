@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')

	        <div class="col-10 pt-5 ">
	        	<div class="row">
	        		<div class="col-md-4">
	        			<div class="col-md-12 card_wrapper">
			        		<div class="card" style="width: 18rem;">
							  <img src="{{asset('/img/profilephoto.jpg')}}" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h3 class="card-title"><b>{{$clientData->client_name}}</b></h3>
							    <h5><b>Phone:</b> {{$clientData->contact_number}}</h5>
							    <p class="card-text"><b>Address:</b> {{$clientData->client_address}}</p>
							  </div>
							</div>
			        	</div>
	        		</div>
	        		<div class="col-md-8">
	        			<div class="col-md-12">
	        				<h2>Othere content hre</h2>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
    </div>

@endsection


