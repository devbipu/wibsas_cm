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

	        				<div class="software_purchase_form_wrapper">
	        					<button id="softadd" class="btn btn-success">Add Service</button>
	        					<div class="add_soft_form_inner py-4" style="display: none;">
	        						<form id="addSoftware">
	                                    @csrf
	                                    <div class="addsoftFrom_cont formInput_pdding">
	                                    	<fieldset>
	                                    		<legend>Business info</legend>
	                                    		<div class="row">
	                                    			<div class="col-6">
                                                        <label for="business_name" class="form-label">Business name <span>*</span></label>
                                                        <input type="text" class="form-control" name="business_name" id="business_name" required>
                                                    </div>
	                                    			<div class="col-6">
                                                        <label for="business_address" class="form-label">Business Address</label>
                                                        <input type="text" class="form-control" name="business_address" id="business_address">
                                                    </div>
                                                </div>
	                                    	</fieldset>

	                                    	<fieldset class="mt-5">
	                                    		<legend>Product info</legend>
		                                        <div class="row">
		                                            <div class="col-6">
		                                                <label for="product_type" class="form-label">Product type <span>*</span></label>
		                                                <select class="form-control" id="product_type" name="product_type" required>
		                                                    <option value="Retail Shop Software">Retail Shop Software</option>
		                                                    <option value="Showroom Management Software">Showroom Management Software</option>
		                                                    <option value="Dealership Management Software">Dealership Management Software</option>
		                                                    <option value="School Management Software">School Management Software</option>
		                                                    <option value="Health Management Software">Health Management Software</option>
		                                                    <option value="Dentaon">Dentaon</option>
		                                                    <option value="Website Design & Development">Website Design & Development</option>
		                                                </select>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_install_id" class="form-label">product install id <span>*</span></label>
		                                                <input type="text" class="form-control" name="product_install_id" id="product_install_id" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_url" class="form-label">product Url <span>*</span></label>
		                                                <input type="text" class="form-control" name="product_url" id="product_url" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_username" class="form-label">product Username <span>*</span></label>
		                                                <input type="text" class="form-control" name="product_username" id="product_username" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_password" class="form-label">product Password <span>*</span></label>
		                                                <input type="text" class="form-control" name="product_password" id="product_password" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_install_date" class="form-label">product Install Date <span>*</span></label>
		                                                <input type="date" class="form-control" name="product_install_date" id="product_install_date" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="product_rafaral" class="form-label">Referral</label>
		                                                <select class="form-control" id="product_rafaral" name="product_rafaral">
		                                                	<option value="In House Marketting">In House Marketting</option>
		                                                	<option value="Agents">Agents</option>
		                                                </select>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="rafared_agents" class="form-label">Agents</label>
		                                                <select class="form-control" id="rafared_agents" name="rafared_agents">
		                                                	
		                                                </select>
		                                            </div>
		                                        </div>
	                                    	</fieldset>

	                                    	<fieldset class="mt-5">
	                                    		<legend>Domain & Hosting Details</legend>
	                                    		<div class="row">
	                                    			<div class="col-6">
                                                        <label for="hosted_by" class="form-label">Hosted by <span>*</span></label>
                                                        <select class="form-select" name="hosted_by" id="hosted_by" required>
                                                            <option value="WorldSoftZone">WorldSoftZone</option>
                                                            <option value="client">Client</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="domain_by" class="form-label">Domain Provide <span>*</span></label>
                                                        <select class="form-select" name="domain_by" id="domain_by" required>
                                                            <option value="WorldSoftZone">WorldSoftZone</option>
                                                            <option value="client">Client</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <label for="domain_hosting_bill_type" class="form-label">Domain & Hosting billing type</label>
                                                        <select class="form-select" name="domain_hosting_bill_type" id="domain_hosting_bill_type">
                                                            <option value="monthly">Monthly</option>
                                                            <option value="yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="domain_hosting_bill" class="form-label">Domain & Hosting Billing Amount</label>
                                                        <input type="number" class="form-control" name="domain_hosting_bill" id="domain_hosting_bill">
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <label for="dh_bill_starting_date" class="form-label">Billing Starting date</label>
                                                        <input type="date" class="form-control" name="dh_bill_starting_date" id="dh_bill_starting_date">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="dh_payment_recived" class="form-label">Payment Received?</label>
                                                        <div class="form-check form-switch">
														  <input class="form-check-input" type="checkbox" role="switch" name="dh_payment_recived" id="dh_payment_recived" value="1">
														  <label class="form-check-label" for="dh_payment_recived">Payment Recived for this mounth?</label>
														</div>
                                                    </div>
                                                </div>
	                                    	</fieldset>

	                                    	<fieldset class="mt-5">
	                                    		<legend>Payment info</legend>
	                                    		<div class="row">
	                                    			<div class="col-6">
                                                        <label for="soft_price" class="form-label">Software Price <span>*</span></label>
                                                        <input type="number" class="form-control" name="soft_price" id="soft_price" required>
                                                    </div>
	                                    			<div class="col-6">
                                                        <label for="installation_charge" class="form-label">Installation Charge(One time) <span>*</span></label>
                                                        <input type="number" class="form-control" name="installation_charge" id="installation_charge" required>
                                                    </div>
	                                    			<div class="col-6">
                                                        <label for="service_level_aggre" class="form-label">SLA <span>*</span></label>
                                                        <select class="form-select" name="service_level_aggre" id="service_level_aggre" required>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="yearly">Yearly</option>
                                                            <option value="none">None</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <label for="service_level_amount" class="form-label">SLA Amount</label>
                                                        <input type="number" class="form-control" name="service_level_amount" id="service_level_amount">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="sla_bill_start_date" class="form-label">Billing Start date</label>
                                                        <input type="date" class="form-control" name="sla_bill_start_date" id="sla_bill_start_date">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="sla_payment_recived" class="form-label">Payment Received?</label>
                                                        <div class="form-check form-switch">
														  <input class="form-check-input" type="checkbox" role="switch" name="sla_payment_recived" id="sla_payment_recived" value="1">
														  <label class="form-check-label" for="sla_payment_recived">Payment Recived for this mounth?</label>
														</div>
                                                    </div>
                                                </div>
	                                    	</fieldset>

	                                    	<input type="hidden" name="client_id" value="{{$c_id}}" required>
	                                    	{{-- <input type="hidden" id="" name="agent_id" value=""> --}}
	                                    	<button type="submit" class="btn btn-info mt-2">Save Changes</button>
		                                </div>
		        					</form>
	        					</div>
	        				</div>

	        				<div class="installedSoftList">
	        					<table class="table table-striped" id="softShowTable">
	        						<thead>
	        							<tr>
	        								<th>Software name</th>
	        								<th>Next SLA Bill Date</th>
	        								<th>SLA Current Bill status</th>
	        							</tr>
	        						</thead>
	        						<tbody>
	        							
	        						</tbody>
	        					</table>
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
		window.addEventListener('DOMContentLoaded', (event) => {
            getAllAgent();
            var client_id = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
            show_installed_soft(client_id);
        });

		document.getElementById('softadd').addEventListener('click', (event) => {
			mytoggle()
		})
		domSelect('#product_rafaral').addEventListener('change', (event) => {
			var select = document.getElementById('product_rafaral');
			var text = select.options[select.selectedIndex].text;
			if(text == "In House Marketting"){
				domSelect('#rafared_agents').innerHTML = "<option value='facebook'>Facebook</option>"
			}else if(text == "Agents"){
				getAllAgent();
			}
		})

		function mytoggle(){
		  var x = document.querySelector(".add_soft_form_inner");
		  var softTable = document.querySelector(".installedSoftList")
		  if (x.style.display === "none") {
		    x.style.display = "block";
		    softTable.style.display = 'none';
		  } else {
		    x.style.display = "none";
		    softTable.style.display = 'block';
		  }
		}

		//Add product per client
		var addSoftFormSubmit = domSelect('#addSoftware').addEventListener('submit', (e) => {
			e.preventDefault();
			//all form data as object
			const form = domSelect('#addSoftware');
			const data = Object.fromEntries(new FormData(form).entries());

			console.log(data);

			axios.post('/addsoftware', data)
			.then((res) => {
				console.log(res);
				// domSelect('#addSoftware').reset();
			})
			.catch((e) => {
				console.log(e);
			})
		})

		function show_installed_soft(id){
			var tableRows = domSelect('#softShowTable tbody');

			axios.post('/getinstalledsoft', {client_id: id})
			.then((res) => {
				console.log(res);
				var products = res.data;
				tableRows.innerHTML = '';
				if(Object.keys(products).length != 0){
					for(var product in products){
						console.log(products[product])
						tableRows.innerHTML += `<tr>
							<td><a href="/home/product-perclient/${products[product].id}">${products[product].business_name}</a></td>
							<td>${products[product].sla_next_bill_date}</td>
							<td>
								${products[product].sla_bill_status ? `<button class="badge bg-success" >Paid</button>` : `<button class="badge bg-danger">UnPaid</button>` }
							</td>
						</tr>`
					}
				}else{
					tableRows.innerHTML = "<tr><td colspan='3'>No Product purchased by this user</td></tr>";
				}
			})
			.catch((e) => {
				console.log(e);
			})
		}


		// get agents
		function getAllAgent(){
			axios.get('/get-all-agents')
			.then((res) => {
				var data = res.data
				var options = domSelect('#rafared_agents');
				options.innerHTML = "";

				for(var agent in data){
					options.innerHTML += `<option  value='${data[agent].id}'>${data[agent].agent_name}</option>`
				}
			})
			.catch((e) => {
				console.log(e);
			})
		}
	</script>

@endsection

