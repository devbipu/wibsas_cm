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

@section('site-js')
    <script type="text/javascript">
        
        /*=================================
                ---Clients js----
        =================================*/

        window.addEventListener('DOMContentLoaded', (event) => {
            showAllClients()
        });


        const myModalEl = document.getElementById('addClientModel');
        let modal = new bootstrap.Modal(myModalEl);

        var clientDatas = domSelect('#addClientsForm').addEventListener('submit', (e)=>{
            e.preventDefault();


            const form = domSelect('#addClientsForm');
            const data = Object.fromEntries(new FormData(form).entries());
            
            domSelect('#addClientBtn').innerHTML= spinner;

            

            axios.post('/addclients', data)
            .then((res) => {
                domSelect('#addClientBtn').innerHTML='Save Changes';
                if(res.status == 200){
                    document.getElementById("addClientsForm").reset();
                    modal.hide();
                    showAllClients();
                    showAllert('success');
                }else{
                    showAllert('faild');
                }
            })
            .catch((error) => {
                console.log(error)
            })
        })



        function showAllClients(){

            axios.get('/all-clients')
            .then((res) => {
                var allClients = res.data;
                var tableRows = domSelect('#clientsTable tbody');
                tableRows.innerHTML = "";
                var count = 1;
                for(var client in allClients){
                    tableRows.innerHTML += "<tr><td>"+
                    count +
                    "</td> <td> <a href ='clients/"+ allClients[client].id +" ' >"+ allClients[client].client_name +
                    "</td><td>"+ allClients[client].contact_name + 
                    "</td><td>"+ allClients[client].contact_number + 
                    "</td><td>"+ allClients[client].client_address + 
                    "</td></tr>"
                    count ++;
                }
            })
            .catch((e) => {
                console.log(e);
            })
        }

    </script>
@endsection
