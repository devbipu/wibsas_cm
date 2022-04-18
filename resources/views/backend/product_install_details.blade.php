@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	    <div class="row">
	        @include('layouts.sidebar')

	        <div class="col-10 pt-5 ">
	        	<div class="row">
	        		<div class="col-md-12">
	        			<div class="col-md-12">
	        				<div class="software_purchase_form_wrapper">
	        					<div class="add_soft_form_inner py-4">
	        						<form id="update_products_per_clients">
	                                    @csrf
	                                    <div class="addsoftFrom_cont formInput_pdding">
	                                    	<div class="row">
	                                    		<div class="col-md-4">
	                                    			<fieldset>
			                                    		<legend>Client info</legend>
			                                    		<div class="row">
			                                    			<div class="col-md-12">
		                                                        <table>
		                                                        	<tbody>
		                                                        		<tr>
		                                                        			<td>Name: </td>
		                                                        			<td>{{$datas->client_name}}</td>
		                                                        		</tr>
		                                                        		<tr>
		                                                        			<td>Phone: </td>
		                                                        			<td>{{$datas->contact_number}}</td>
		                                                        		</tr>
		                                                        		<tr>
		                                                        			<td>Address: </td>
		                                                        			<td>{{$datas->client_address}}</td>
		                                                        		</tr>
		                                                        	</tbody>
		                                                        </table>
		                                                    </div>
		                                                </div>
			                                    	</fieldset>
	                                    			<fieldset class="mt-4">
			                                    		<legend>Business info</legend>
			                                    		<div class="row">
			                                    			<div class="col-md-12">
		                                                        <label for="business_name" class="form-label">Business name <span>*</span></label>
		                                                        <input type="text" class="form-control" value="{{$datas->business_name}}" name="business_name" id="business_name" required>
		                                                    </div>
			                                    			<div class="col-md-12">
		                                                        <label for="business_address" class="form-label">Business Address</label>
		                                                        <input value="{{$datas->business_address}}" type="text" class="form-control" name="business_address" id="business_address">
		                                                    </div>
		                                                </div>
			                                    	</fieldset>
	                                    		</div>
	                                    		<div class="col-md-8">
	                                    			<fieldset class="">
			                                    		<legend>Product info</legend>
				                                        <div class="row">
				                                            <div class="col-6">
				                                                <label for="product_type" class="form-label">Product type <span>*</span></label>
				                                                <select class="form-control" id="product_type" name="product_type" required>
				                                                    <option value="Retail Shop Software" @if($datas->product_type == 'Retail Shop Software') selected @endif >Retail Shop Software</option>
				                                                    <option value="Showroom Management Software" @if($datas->product_type == 'Showroom Management Software') selected @endif >Showroom Management Software</option>
				                                                    <option value="Dealership Management Software" @if($datas->product_type == 'Dealership Management Software') selected @endif >Dealership Management Software</option>
				                                                    <option value="School Management Software" @if($datas->product_type == 'School Management Software') selected @endif >School Management Software</option>
				                                                    <option value="Health Management Software" @if($datas->product_type == 'Health Management Software') selected @endif >Health Management Software</option>
				                                                    <option value="Dentaon" @if($datas->product_type == 'Dentaon') selected @endif>Dentaon</option>
				                                                    <option value="Website Design & Development" @if($datas->product_type == 'Website Design & Development') selected @endif>Website Design & Development</option>
				                                                </select>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_install_id" class="form-label">Product install id <span>*</span></label>
				                                                <input value="{{$datas->product_install_id}}" type="text" class="form-control" name="product_install_id" id="product_install_id" required>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_url" class="form-label">Product Url <span>*</span></label>
				                                                <input value="{{$datas->product_url}}" type="text" class="form-control" name="product_url" id="product_url" required>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_username" class="form-label">Product Username <span>*</span></label>
				                                                <input value="{{$datas->product_username}}" type="text" class="form-control" name="product_username" id="product_username" required>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_password" class="form-label">Product Password <span>*</span></label>
				                                                <input value="{{$datas->product_password}}" type="text" class="form-control" name="product_password" id="product_password" required>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_install_date" class="form-label">Product Install Date <span>*</span></label>
				                                                <input value="{{$datas->product_install_date}}" type="date" class="form-control" name="product_install_date" id="product_install_date" required>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="product_rafaral" class="form-label">Referral</label>
				                                                <select class="form-control" id="product_rafaral" name="product_rafaral">
				                                                	<option value="In House Marketting" @if($datas->product_rafaral == 'In House Marketting') selected @endif >In House Marketting</option>
				                                                	<option value="Agents" @if($datas->product_rafaral == 'Agents') selected @endif >Agents</option>
				                                                </select>
				                                            </div>
				                                            <div class="col-6">
				                                                <label for="rafared_agents" class="form-label" >Agents</label>
				                                                <select class="form-control" id="rafared_agents" name="rafared_agents">
				                                                	
				                                                </select>
				                                            </div>
				                                        </div>
			                                    	</fieldset>
	                                    		</div>
	                                    		<div class="col-md-6">
	                                    			<fieldset class="mt-5">
			                                    		<legend>Domain & Hosting Details</legend>
			                                    		<div class="row">
			                                    			<div class="col-6">
		                                                        <label for="hosted_by" class="form-label">Hosted by <span>*</span></label>
		                                                        <select class="form-select" name="hosted_by" id="hosted_by" required>
		                                                            <option value="WorldSoftZone" @if($datas->hosted_by == 'WorldSoftZone') selected @endif >WorldSoftZone</option>
		                                                            <option value="client"  @if($datas->hosted_by == 'client') selected @endif>Client</option>
		                                                        </select>
		                                                    </div>
		                                                    <div class="col-6">
		                                                        <label for="domain_by" class="form-label">Domain Provide <span>*</span></label>
		                                                        <select class="form-select" name="domain_by" id="domain_by" required>
		                                                            <option value="WorldSoftZone" @if($datas->domain_by == 'WorldSoftZone') selected @endif>WorldSoftZone</option>
		                                                            <option value="client" @if($datas->domain_by == 'client') selected @endif>Client</option>
		                                                        </select>
		                                                    </div>
		                                                    
		                                                    <div class="col-6">
		                                                        <label for="domain_hosting_bill_type" class="form-label">Domain & Hosting billing type</label>
		                                                        <select class="form-select" name="domain_hosting_bill_type" id="domain_hosting_bill_type">
		                                                            <option value="monthly" @if($datas->domain_hosting_bill_type == 'monthly') selected @endif>Monthly</option>
		                                                            <option value="yearly" @if($datas->domain_hosting_bill_type == 'yearly') selected @endif>Yearly</option>
		                                                        </select>
		                                                    </div>
		                                                    <div class="col-6">
		                                                        <label for="domain_hosting_bill" class="form-label">Billing Amount</label>
		                                                        <input value="{{$datas->domain_hosting_bill}}" type="number" class="form-control" name="domain_hosting_bill" id="domain_hosting_bill">
		                                                    </div>
		                                                    
		                                                    <div class="col-6">
		                                                        <label for="dh_bill_starting_date" class="form-label">Billing Starting date</label>
		                                                        <input value="{{$datas->dh_bill_starting_date}}" type="date" class="form-control" name="dh_bill_starting_date" id="dh_bill_starting_date">
		                                                    </div>
		                                                    <div class="col-6">
		                                                        <label for="dh_payment_recived" class="form-label">Payment Received?</label>
		                                                        <div class="form-check form-switch">
																  <input class="form-check-input" type="checkbox" role="switch" name="dh_payment_recived" id="dh_payment_recived" value="1" disabled>
																  <label class="form-check-label" for="dh_payment_recived">Payment Recived for this mounth?</label>
																</div>
		                                                    </div>
		                                                </div>
			                                    	</fieldset>
	                                    		</div>
	                                    		<div class="col-md-6">
			                                    	<fieldset class="mt-5">
			                                    		<legend>Payment info</legend>
			                                    		<div class="row">
			                                    			<div class="col-6">
		                                                        <label for="soft_price" class="form-label">Software Price <span>*</span></label>
		                                                        <input value='{{$datas->soft_price}}' type="number" class="form-control" name="soft_price" id="soft_price" required>
		                                                    </div>
			                                    			<div class="col-6">
		                                                        <label for="installation_charge" class="form-label">Installation Charge(One time) <span>*</span></label>
		                                                        <input value='{{$datas->installation_charge}}' type="number" class="form-control" name="installation_charge" id="installation_charge" required>
		                                                    </div>
			                                    			<div class="col-6">
		                                                        <label for="service_level_aggre" class="form-label">SLA <span>*</span></label>
		                                                        <select class="form-select" name="service_level_aggre" id="service_level_aggre" required>
		                                                            <option value="monthly" @if($datas->service_level_aggre == 'monthly') selected @endif>Monthly</option>
		                                                            <option value="yearly" @if($datas->service_level_aggre == 'yearly') selected @endif>Yearly</option>
		                                                            <option value="none" @if($datas->service_level_aggre == 'none') selected @endif>None</option>
		                                                        </select>
		                                                    </div>
		                                                    
		                                                    <div class="col-6">
		                                                        <label for="service_level_amount" class="form-label">SLA Amount</label>
		                                                        <input value='{{$datas->service_level_amount}}' type="number" class="form-control" name="service_level_amount" id="service_level_amount">
		                                                    </div>
		                                                    <div class="col-6">
		                                                        <label for="sla_bill_start_date" class="form-label">Billing Start date</label>
		                                                        <input value='{{$datas->sla_bill_start_date}}' type="date" class="form-control" name="sla_bill_start_date" id="sla_bill_start_date">
		                                                    </div>
		                                                    <div class="col-6">
		                                                        <label for="sla_payment_recived" class="form-label">Payment Received?</label>
		                                                        <div class="form-check form-switch"> 
																  <input class="form-check-input" type="checkbox" role="switch" name="sla_payment_recived" id="sla_payment_recived" value="1" disabled>
																  <label class="form-check-label" for="sla_payment_recived">Payment Recived for this mounth?</label>
																</div>
		                                                    </div>
		                                                </div>
			                                    	</fieldset>
	                                    		</div>
	                                    	</div>

	                                    	<input type="hidden" name="product_id" value="{{$datas->id}}" required>
	                                    	{{-- <input type="hidden" id="" name="agent_id" value=""> --}}
	                                    	<button type="submit" class="btn btn-info mt-2">Save Changes</button>
		                                </div>
		        					</form>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
    </div>

@endsection




@section('site-js')

	<script type="text/javascript">
		 domSelect('#update_products_per_clients').addEventListener('submit', (e) => {
		 	e.preventDefault();
		 	var form = domSelect('#update_products_per_clients');
			const formdatas = Object.fromEntries(new FormData(form).entries());
			axios.post('/updateinstalledsoftdata', formdatas)
			.then( (res) => {
				if(res.status == 200){
					showAllert('success');
					form.reset();
				}else{
					showAllert('faild');
				}
			})
			.catch( (e) => {
				showAllert('faild');
				console.log(e)
			})
		 })
			
		


		// async function getAddBilling(){
		// 	try {
	 //            const response = await axios.get('/get-all-install-billing');
	 //            const billngsInfo = await response.data;
	</script>
@endsection

