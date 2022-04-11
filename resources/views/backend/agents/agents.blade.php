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
                            data-bs-target="#addAgentModel">
                            Add new Agent
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addAgentModel" tabindex="-1" aria-labelledby="addAgentModel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form id="addAgentsForm">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add new Agent</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container formInput_pdding">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="agent_name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="agent_name" name="agent_name" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="agent_number" class="form-label">Phone</label>
                                                        <input type="number" class="form-control" id="agent_number" name="agent_number" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="alter_contact" class="form-label">Alternative Number</label>
                                                        <input type="text" class="form-control" id="alter_contact" name="alter_contact" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="agent_email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="agent_email" name="agent_email" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="agent_address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="agent_address" name="agent_address" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>    
                                            <button type="submit" class="btn btn-primary" id="addAgentBtn">Add Agent</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                   
                <div class="allAgents mt-4">
                    <table class="table table-striped" id="agentsTable">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
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
                ---Agents js----
        =================================*/

        window.addEventListener('DOMContentLoaded', (event) => {
            showAllAgents();
        });


        const myModalEl = document.getElementById('addAgentModel');
        let modal = new bootstrap.Modal(myModalEl);

        var clientDatas = domSelect('#addAgentsForm').addEventListener('submit', (e)=>{
            e.preventDefault();


            // const form = domSelect('#addAgentsForm');
            const data = Object.fromEntries(new FormData(domSelect('#addAgentsForm')).entries());
            
            domSelect('#addAgentBtn').innerHTML= spinner;

            
            axios.post('/addagent', data)
            .then((res) => {
                domSelect('#addAgentBtn').innerHTML='Add Agent';
                if(res.status == 200){
                    document.getElementById("addAgentsForm").reset();
                    modal.hide();
                    showAllAgents()
                }
            })
            .catch((error) => {
                console.log(error)
            })
        })



        function showAllAgents(){

            axios.get('/all-agents')
            .then((res) => {
                var allAgents = res.data;
                var tableRows = domSelect('#agentsTable tbody');
                tableRows.innerHTML = "";
                let count = 1;
                for(var agent in allAgents){
                    tableRows.innerHTML += "<tr><td>"+
                    count +
                    "</td><td>"+ allAgents[agent].agent_name +
                    "</td><td>"+ allAgents[agent].agent_number + 
                    "</td><td>"+ allAgents[agent].agent_email + 
                    "</td><td>"+ allAgents[agent].agent_address + 
                    "</td></tr>";
                    count ++
                }
            })
            .catch((e) => {
                console.log(e);
            })
        }

    </script>
@endsection
