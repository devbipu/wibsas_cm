@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-10 pt-5 content_wrapper">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addClientModel">
                            Add new client
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addClientModel" tabindex="-1" aria-labelledby="addClientModelLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form id="addClientsForm">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addClientModelLabel">Add new client</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="client_name" class="form-label">Client Name</label>
                                                        <input type="text" class="form-control" id="client_name" name="client_name" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="contact_name" class="form-label">Contact Name</label>
                                                        <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="contact_number" class="form-label">Contact Number</label>
                                                        <input type="number" class="form-control" id="contact_number" name="contact_number" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="alter_contact" class="form-label">Alternative Number</label>
                                                        <input type="text" class="form-control" id="alter_contact" name="alter_contact" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="client_address" name="client_address" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>    
                                            <button type="submit" class="btn btn-primary" id="addClientBtn">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="addClientModel" tabindex="-1" aria-labelledby="addClientModelLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="addClientModelLabel">Add new client</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                              <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Genaral info
                                                  </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                  <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="client_name" class="form-label">Client Name</label>
                                                            <input type="text" class="form-control" id="client_name" name="client_name">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="client_id" class="form-label">Client id</label>
                                                            <input type="text" class="form-control" id="client_id" name="client_id">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="contact_name" class="form-label">Contact Name</label>
                                                            <input type="text" class="form-control" id="contact_name" name="contact_name">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="contact_number" class="form-label">Contact Number</label>
                                                            <input type="number" class="form-control" id="contact_number" name="contact_number">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="alternative_number" class="form-label">Alternative Number</label>
                                                            <input type="text" class="form-control" id="alternative_number" name="alternative_number">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address">
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Software Info
                                                  </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                  <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="software_type" class="form-label">Software type</label>
                                                            <select class="form-control" id="software_type" name="software_type">
                                                                <option value="whms">Ok</option>
                                                                <option value="whms">Ok</option>
                                                                <option value="whms">Ok</option>
                                                                <option value="whms">Ok</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="app_install_id" class="form-label">App install id</label>
                                                            <input type="text" class="form-control" name="app_install_id" id="app_install_id">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="app_url" class="form-label">App Url</label>
                                                            <input type="text" class="form-control" name="app_url" id="app_url">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="app_username" class="form-label">App Username</label>
                                                            <input type="text" class="form-control" name="app_username" id="app_username">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="app_password" class="form-label">App Password</label>
                                                            <input type="text" class="form-control" name="app_password" id="app_password">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="app_install_date" class="form-label">App Install Date</label>
                                                            <input type="date" class="form-control" name="app_install_date" id="app_install_date">
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree">
                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Billing info
                                                  </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                  <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="installment_date" class="form-label">Installment Date</label>
                                                            <input type="date" class="form-control" name="installment_date" id="installment_date">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="installment_charge" class="form-label">Installment charge</label>
                                                            <input type="number" class="form-control" name="installment_charge" id="installment_date">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="service_type" class="form-label">Bill Type</label>
                                                            <select class="form-select" id="service_type">
                                                                <option value="ok">Daily</option>
                                                                <option value="ok">Weekly</option>
                                                                <option value="ok">Monthly</option>
                                                                <option value="ok">Yearly</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="bill_type_charge" class="form-label">Bill Type Charge</label>
                                                            <input type="number" class="form-control" name="bill_type_charge" id="bill_type_charge">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="billing_date" class="form-label">Billing date</label>
                                                            <input type="number" class="form-control" name="billing_date" id="billing_date">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="payment_status" class="form-label">Payment status</label>
                                                            <input type="text" class="form-control" name="payment_status" id="payment_status">
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>    
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                <div class="allclients mt-4">
                    <table class="table table-striped" id="clientsTable">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Client Name</th>
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
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
@endsection
