@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')
	        <div class="col-10 pt-5 ">


	        	<div class="col-md-12">
	        		<div class="softInstallListWrapper">
	        			<h4>All products</h4>
	        			<table class="softInsSowTable table table-striped">
		        			<thead>
		        				<tr>
		        					<th>Sl. No</th>
		        					<th>Client Name</th>
		        					<th>Business Name</th>
		        					<th>Business Address</th>
		        					<th>Service Type</th>
		        					<th>Product Install Id</th>
		        					<th>Product Url</th>
		        					<th>Product Username</th>
		        					<th>Product Password</th>
		        					<th>Product Install Date</th>
		        					<th>Product Rafaral by</th>
		        				</tr>
		        			</thead>
		        			<tbody>

		        				@php $count = 0 @endphp

		        				@foreach($all_install as $install)
		        					@php $count ++ @endphp
				        			<tr>
				        				<td>{{$count}}</td>
				        				<td><a href="clients/{{$install->client_id}}">{{$install->client_name}}</a></td>
				        				<td> {{$install->business_name}}</td>
			        					<td> {{$install->business_address}} </td>
			        					<td> {{$install->product_type}} </td>
			        					<td> {{$install->product_install_id}} </td>
			        					<td> {{$install->product_url}} </td>
			        					<td> {{$install->product_username}} </td>
			        					<td> {{$install->product_password}} </td>
			        					<td> {{$install->product_install_date}} </td>
			        					<td> <a href="agents/{{$install->agent_id}}">{{$install->agent_name}}</a>  </td>
				        			</tr>
				        		@endforeach
		        			</tbody>
	        		</table>
	        		</div>
	        	</div>



	        	{{-- Show all soft by grid system --}}

	        	{{-- <div class="col-md-12 mb-5 d-none">
	        		<div class="row">
        				@foreach($all_install as $install)
        					<div class="col-md-3">
	        					<div class="card">
								  <div class="card-body">
								    <h5 class="card-title">{{$install->business_name}}</h5>
								    <h6 class="card-subtitle mb-2 text-muted">{{$install->product_type}}</h6>
								    <p class="card-text">{{$install->business_address}}</p>
								    <a href="#" onclick="showInstallModal({{$install->id}})" class="card-link">See Details</a>
								  </div>
								</div>
	        				</div>
        				@endforeach
	        		</div>
	        	</div> --}}

				{{-- 
				<!-- Modal -->
				<div class="modal fade" id="installDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog modal-xl">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body" id="showSoftInsDetailsBody">
				        
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div> --}}
	        	
	        </div>
	        {{-- Content warpper end --}}
	    </div>
	</div>

@endsection


@section('site-js')
	{{-- <script type="text/javascript">	
		function showInstallModal(soft_ins_id){
			const myModalEl = document.getElementById('installDetailsModal');
        	let modal = new bootstrap.Modal(myModalEl);
        	document.querySelector('#showSoftInsDetailsBody').innerHTML = "";
        	

        	axios.post('/get-soft-insdata', {softinstallID:soft_ins_id})
        	.then((res) => {
        		var resData = res.data;
        		var insertDataIntoModal = `<div>

        			<div class="row">
        				<div class='col-md-4'>
        					<fieldset>
	        					<legend>Genaral info</legend>
	        					<table class="table table-bordered mt-3">
	        						<tbody>

	        							<tr>
	        								<td>Client Name</td>
	        								<td>${resData.contact_name}</td>
	        							</tr>
	        							<tr>
	        								<td>Client Phone</td>
	        								<td><a href="tel:${resData.contact_number}">${resData.contact_number}</a></td>
	        							</tr>
	        							<tr>
	        								<td>Business Name</td>
	        								<td>${resData.business_name}</td>
	        							</tr>
	        							<tr>
	        								<td>Business Name</td>
	        								<td>${resData.business_address}</td>
	        							</tr>

	        						</tbody>
	        					</table>
	        					
	        				</fieldset>
        				</div>
        				<div class='col-md-4'>
        					<fieldset>
	        					<legend>Product info</legend>
	        					<table class="table table-bordered mt-3">
	        						<tbody>

	        							<tr>
	        								<td>Poduct Name</td>
	        								<td>${resData.product_type}</td>
	        							</tr>
	        							<tr>
	        								<td>Product url</td>
	        								<td>${resData.product_url}</a></td>
	        							</tr>
	        							<tr>
	        								<td>Product Username</td>
	        								<td>${resData.product_username}</td>
	        							</tr>
	        							<tr>
	        								<td>Product Password</td>
	        								<td>${resData.product_password}</td>
	        							</tr>
	        							<tr>
	        								<td>Install Date</td>
	        								<td>${resData.product_install_date}</td>
	        							</tr>
	        							<tr>
	        								<td>Rafared info</td>
	        								<td> <a href="${resData.product_rafaral}">${resData.product_rafaral}</a></td>
	        							</tr>
	        						</tbody>
	        					</table>
	        				</fieldset>
        				</div>
        				<div class='col-md-4'>
        					<fieldset>
	        					<legend>Billing info</legend>
	        					<table class="table table-bordered mt-3">
	        						<tbody>
	        							<tr>
	        								<td>Software Price</td>
	        								<td>${resData.soft_price}</td>
	        							</tr>
	        							<tr>
	        								<td>Installation Charge</td>
	        								<td>${resData.installation_charge}</a></td>
	        							</tr>
	        							<tr>
	        								<td>SLA Type</td>
	        								<td>${resData.service_level_aggre}</td>
	        							</tr>
	        							<tr>
	        								<td>SLA Amount</td>
	        								<td>${resData.service_level_amount}</td>
	        							</tr>
	        							<tr>
	        								<td>Next SLA Date</td>
	        								<td> <a href="${resData.product_rafaral}">${resData.product_rafaral}</a></td>
	        							</tr>
	        						</tbody>
	        					</table>	        					
	        				</fieldset>
        				</div>
        			</div>
        		</div>`

        		document.querySelector('#showSoftInsDetailsBody').innerHTML = insertDataIntoModal;
				modal.show();
        		console.log(resData)
        	})
        	.catch((e) => {
        		console.log(e)
        	})
		}
	</script> --}}
@endsection