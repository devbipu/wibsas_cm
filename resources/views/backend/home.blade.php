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
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addClientModel" tabindex="-1" aria-labelledby="addClientModelLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addClientModelLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form action="">
                                                <fieldset>
                                                    <legend>Genaral Info: </legend>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="client_name" class="form-label">Client
                                                                    name</label>
                                                                <input type="text" class="form-control" id="client_name"
                                                                    name="client_name">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="client_name" class="form-label">Client
                                                                    name</label>
                                                                <input type="text" class="form-control" id="client_name"
                                                                    name="client_name">
                                                            </div>
                                                        </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
