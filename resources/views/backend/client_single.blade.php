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
		                                                <label for="service_type" class="form-label">Product type <span>*</span></label>
		                                                <select class="form-control" id="service_type" name="service_type" required>
		                                                    <option value="retail">Retail Shop Software</option>
		                                                    <option value="showroom">Showroom Management Software</option>
		                                                    <option value="dealership">Dealership Management Software</option>
		                                                    <option value="wsms">School Management Software</option>
		                                                    <option value="whms">Health Management Software</option>
		                                                    <option value="webdesign">Dentaon</option>
		                                                    <option value="webdesign">Website Design & Development</option>
		                                                </select>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_install_id" class="form-label">App install id <span>*</span></label>
		                                                <input type="text" class="form-control" name="app_install_id" id="app_install_id" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_url" class="form-label">App Url <span>*</span></label>
		                                                <input type="text" class="form-control" name="app_url" id="app_url" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_username" class="form-label">App Username <span>*</span></label>
		                                                <input type="text" class="form-control" name="app_username" id="app_username" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_password" class="form-label">App Password <span>*</span></label>
		                                                <input type="text" class="form-control" name="app_password" id="app_password" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_install_date" class="form-label">App Install Date <span>*</span></label>
		                                                <input type="date" class="form-control" name="app_install_date" id="app_install_date" required>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="app_rafaral" class="form-label">Referral</label>
		                                                <select class="form-control" id="app_rafaral" name="app_rafaral">
		                                                	<option value="inhouseMarketting">In House Marketting</option>
		                                                	<option value="agents">Agents</option>
		                                                </select>
		                                            </div>
		                                            <div class="col-6">
		                                                <label for="rafared_agents" class="form-label">Agents</label>
		                                                <select class="form-control" id="rafared_agents" name="rafared_agents">
		                                                	<option value="agent1">Agent One</option>
		                                                	<option value="agent1">Agent One</option>
		                                                	<option value="agent1">Agent One</option>
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
                                                        <label for="bill_starting_date" class="form-label">Billing Starting date</label>
                                                        <input type="date" class="form-control" name="bill_starting_date" id="bill_starting_date">
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
                                                            <option value="daily">Daily</option>
                                                            <option value="weekly">Weekly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="yearly">Yearly</option>
                                                            <option value="none">None</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <label for="bill_amount" class="form-label">SLA Amount</label>
                                                        <input type="number" class="form-control" name="bill_amount" id="bill_amount">
                                                    </div>
                                                </div>
	                                    	</fieldset>

	                                    	<input type="hidden" name="client_id" value="{{$c_id}}" required>
	                                    	<button type="submit" class="btn btn-info mt-2">Save Changes</button>
		                                </div>
		        					</form>
	        					</div>
	        				</div>

	        				<div class="installedSoftList">
	        					<button onclick="show_installed_soft(1)">Show</button>
	        					<table class="table table-striped" id="softShowTable">
	        						<thead>
	        							<tr>
	        								<th>Software name</th>
	        								<th>Next billing date</th>
	        								<th>Bill Amount</th>
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
		document.getElementById('softadd').addEventListener('click', (event) => {
			mytoggle()
			
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


		var addSoftFormSubmit = domSelect('#addSoftware').addEventListener('submit', (e) => {
			e.preventDefault();
			//all form data as object
			const form = domSelect('#addSoftware');
			const data = Object.fromEntries(new FormData(form).entries());

			console.log(data);

			axios.post('/addsoftware', data)
			.then((res) => {
				console.log(res);
				domSelect('#addSoftware').reset();
			})
			.catch((e) => {
				console.log(e);
			})
		})

		function show_installed_soft(id){
			axios.get('/getinstalledsoft/'+ id)
			.then((res) => {
				var softInsData = res.data;
				var tableRows = domSelect('#softShowTable tbody');
				tableRows.innerHTML = '';

				for(var softData in softInsData){
					console.log(softInsData[softData])
					tableRows.innerHTML += 
					"<tr><td>"+ softInsData[softData].business_name +
                    "</td><td>"+ softInsData[softData] + 
                    "</td><td>"+ softInsData[softData].service_level_amount + 
                    "</td></tr>"
				}
			})
			.catch((e) => {
				console.log(e);
			})
		}
	</script>

@endsection

