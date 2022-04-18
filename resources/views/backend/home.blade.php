@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-10 pt-5 content_wrapper">
            <h3>Ovarall summery Dashboard</h3>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_client}}</h3>
                            <p class="card-text">Total Clients</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_agent}}</h3>
                            <p class="card-text">Total Agent</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_product}}</h3>
                            <p class="card-text">Total Product Install</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_DH_bill}}</h3>
                            <p class="card-text">Total Domain & Hosting Bill</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_DH_bill_amount}} /=</h3>
                            <p class="card-text">Total DH Bill Amount</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_sla_bill}}</h3>
                            <p class="card-text">Total SLA Bill</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <h3 class="card-title">{{$total_bill_sla_amount}} /=</h3>
                            <p class="card-text">Total SLA Bill Amount</p>
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
    <script>
        
    </script>
@endsection
