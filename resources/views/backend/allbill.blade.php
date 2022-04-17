@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')
	        <div class="col-10 pt-5 ">
	        	<h3>All billing </h3>
	        	<div class="col-md-12  d-none">
	        		<div class="softInstallListWrapper ">
	        			<table class="table table-striped billingTable">
		        			<thead>
		        				<tr>
		        					<th>Sl. No</th>
		        					<th>Client Name</th>
		        					<th>Business Name</th>
		        					<th>Type of Product</th>
		        					<th>Hosted By</th>
		        					<th>Domain By</th>
		        					<th>Domain Hosting Bill Type</th>
		        					<th>Domain Hosting Bill</th>
		        					<th>Domain Hosting Bill Starting Date</th>
		        					<th>Next Domain Hosting Bill Date</th>
		        					<th>Domain Hosting Bill Status</th>
		        					<th>Software Price</th>
		        					<th>Installation Charge</th>
		        					<th>Installation Payment Status</th>
		        					<th>SLA Type</th>
		        					<th>SLA Amount</th>
		        					<th>Next Billing date</th>
		        					<th>SLA Billing Status</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        				@php $count = 0 @endphp
		        				@foreach($billes as $install)
		        					@php $count ++; $id = $install->id  @endphp
				        			<tr>
				        				<td>{{$count}}</td>
			        					<td> <a href='clients/{{$install->client_id}}'>{{$install->client_name}}</a> </td>
			        					<td> {{$install->business_name}} </td>
			        					<td> {{$install->product_type}} </td>
			        					<td> {{$install->hosted_by}} </td>
			        					<td> {{$install->domain_by}} </td>
			        					<td> {{$install->domain_hosting_bill_type}} </td>
			        					<td> {{$install->domain_hosting_bill}} </td>
			        					<td> {{$install->dh_bill_starting_date}} </td>
			        					<td> 01/02/2022 </td>
			        					<td>
			        						@if($install->dh_bill_status == 1)
			        							<button  onclick="changePayStatus(0, {{$install->id}}, 'dh_bill_status')" class="badge bg-success" id="dh_bill_status-{{ $install->id }}">Paid</button>
			        						@elseif($install->dh_bill_status == 0)
			        							<button onclick="changePayStatus(1, {{$install->id}}, 'dh_bill_status')" class="badge bg-danger" id="dh_bill_status-{{ $install->id }}">UnPaid</button>
			        						@endif
			        					</td>
			        					<td> {{$install->soft_price}} </td>
			        					<td> {{$install->installation_charge}} </td>
			        					<td> 
			        						@if($install->install_bill_status == 1)
			        							<button onclick="changePayStatus(0, {{$install->id}}, 'install_bill_status')" class="badge bg-success">Paid</button>
			        						@elseif($install->install_bill_status == 0)
			        							<button onclick="changePayStatus(1, {{$install->id}}, 'install_bill_status')" class="badge bg-danger">UnPaid</button>
			        						@endif
			        					</td>
			        					<td> {{$install->service_level_aggre}} </td>
			        					<td> {{$install->service_level_amount}} </td>
			        					<td id='next_billing_date'>
			        						{{date('Y-m-d', strtotime('+1 month ' . $install->sla_bill_start_date))}}
			        					</td>
			        					<td>
			        						@if($install->sla_bill_status == 1)
			        							<button onclick="changePayStatus(0, {{$install->id}}, 'sla_bill_status')" class="badge bg-success">Paid</button>
			        						@elseif($install->sla_bill_status == 0)
			        							<button onclick="changePayStatus(1, {{$install->id}}, 'sla_bill_status')" class="badge bg-danger">UnPaid</button>
			        						@endif
			        					</td>
				        			</tr>
				        		@endforeach
		        			</tbody>
	        			</table>
	        		</div>
	        	</div>
	        	<div class="col-md-12">
	        		<div class="softInstallListWrapper ">
	        			<table class="table table-striped billingTable">
		        			<thead>
		        				<tr>
		        					<th>Sl. No</th>
		        					<th>Client Name</th>
		        					<th>Business Name</th>
		        					<th>Type of Product</th>
		        					<th>Hosted By</th>
		        					<th>Domain By</th>
		        					<th>Domain Hosting Bill Type</th>
		        					<th>Domain Hosting Bill</th>
		        					<th>Domain Hosting Bill Starting Date</th>
		        					<th>Next Domain Hosting Bill Date</th>
		        					<th>Domain Hosting Bill Status</th>
		        					<th>Software Price</th>
		        					<th>Installation Charge</th>
		        					<th>Installation Payment Status</th>
		        					<th>SLA Type</th>
		        					<th>SLA Amount</th>
		        					<th>Next Billing date</th>
		        					<th>SLA Billing Status</th>
		        				</tr>
		        			</thead>
		        			<tbody id="all_billing">
		        				
		        			</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>

@endsection


@section('site-js')
	<script type="text/javascript">

		window.onload = (event) => {
		  getAddBilling();
		  
		  checkPayStatusPerMonth();
		};

		
		// Payment status change 
		function changePayStatus(payStatus, id, columnName, bill_date, bill_renew_type, next_bill_column_name, billFor){
			console.log(payStatus, id, columnName, bill_date, bill_renew_type, next_bill_column_name, billFor);

			var confirmation = confirm("Do you want to change the payment status?")
			if(confirmation){
				axios.post('/change-payment-status', {DHpayStatus: payStatus, softInsId: id, changeColumenName: columnName, currentBillingDate: bill_date, bill_renew_type: bill_renew_type, next_bill_column_name: next_bill_column_name, billFor: billFor})
				.then( (res) => {
					console.log(res.data);
					if(res.status == 200){
						getAddBilling()
					}
				})
				.catch( (e) => {
					console.log(e);
				})
			}
		}

		async function getAddBilling(){
			try {
            const response = await axios.get('/get-all-install-billing');
            const billngsInfo = await response.data;
            let allRows = '';

				billngsInfo.map(billngInfo => {
					allRows += `<tr>
						<td> ${billngInfo.id}</td>
						<td> ${billngInfo.client_name}</td>
						<td> ${billngInfo.business_name}</td>
						<td> ${billngInfo.product_type}</td>
						<td> ${billngInfo.hosted_by}</td>
						<td> ${billngInfo.domain_by}</td>
						<td> ${billngInfo.domain_hosting_bill_type}</td>
						<td> ${billngInfo.domain_hosting_bill}</td>
						<td> ${billngInfo.dh_bill_starting_date}</td>
						<td> ${billngInfo.dh_next_bill_date}</td>
						<td>${billngInfo.dh_bill_status ? `<button  onclick="" class="badge bg-success" >Paid</button>` : `<button onclick="changePayStatus(1, ${billngInfo.id}, 'dh_bill_status', '${billngInfo.dh_bill_starting_date}', '${billngInfo.domain_hosting_bill_type}', 'dh_next_bill_date', 'dhBill')" class="badge bg-danger">UnPaid</button>` }</td>
						<td>${billngInfo.soft_price}</td>
						<td>${billngInfo.installation_charge}</td>
						<td>${billngInfo.install_bill_status ? `<button  onclick="" class="badge bg-success" >Paid</button>` : `<button onclick="changePayStatus(1, ${billngInfo.id}, 'install_bill_status', 'none', 'none', 'none', 'installbill')" class="badge bg-danger">UnPaid</button>` }</td>
						<td>${billngInfo.service_level_aggre}</td>
						<td>${billngInfo.service_level_amount}</td>
						<td>${billngInfo.sla_next_bill_date}</td>

						<td>${billngInfo.sla_bill_status ? `<button  onclick="" class="badge bg-success" >Paid</button>` : `<button onclick="changePayStatus(1, ${billngInfo.id}, 'sla_bill_status', '${billngInfo.sla_next_bill_date}', '${billngInfo.service_level_aggre}', 'sla_next_bill_date', 'slaBill')" class="badge bg-danger">UnPaid</button>` }</td>
					</tr>`

				})

				let tableBody = document.getElementById('all_billing')
				tableBody.innerHTML = allRows
			}


			catch(error){
				console.log(error)
			}
		}

		function checkPayStatusPerMonth(){
			axios.get('/checkPayStatus')
			.then((res) => {
				console.log(res.status);
			})
			.catch( (e) => {
				console.log(e)
			} )
		}

	</script>
@endsection