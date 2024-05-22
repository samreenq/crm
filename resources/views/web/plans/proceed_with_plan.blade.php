@extends('layout')


<style>
    .card-body.pln-card {
    background: #f5f5f5;
}
.pln-card h5{
    font-size: 20px;
    FONT-WEIGHT: 600;
}
.pln-card p{
    color: #81A166;
    font-family: "Poppins";

    font-size: 18px;
    font-style: normal;
    font-weight: 600;
    line-height: 18px;
}
.pln-card h6{
    font-size: 16px;
    margin-top: 11px;
    font-weight: 500;
    line-height: 23px;
}
.card.pln-pkgs h4 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 28px;
    background: #7393B3;
    padding: 15px 10px;
    color: #fff;
    text-align: center;
    border-radius: 7px;
}
.col-md-12.pln-pkgs label {
    color: #000;
    font-size: 15px;
    margin-bottom: 8px;
    font-weight: 400;
}
.col-md-12.pln-pkgs input {
    outline: none;
    margin-bottom: 8px;
    height: 44px;
}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #7393B3 !important;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(191 205 107) !important
}
.pln-pkgs button{
    background:#b1b1b1;
    color: white;
    font-weight: 700;
    height: 49px;
    border:  1px solid #fff
}
.pln-pkgs button:hover{
    background:#fff;
    color: #7393B3;
    border:  1px solid #7393B3;
    font-weight: 700;
    height: 49px;
}
    </style>





@section('body_container')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <select name="" id="package-type-select" class="form-control">
                                @if (!empty($plan[0]['get_sub_plans']))
                                    @foreach ($plan[0]['get_sub_plans'] as $value)
                                        <option value="{{ $plan[0]['plan_id'] . '/' . $value['s_plan_id'] }}">
                                            @if ($value['sp_name'] == 'Month') Monthly
                                            @else
                                                Yearly
                                            @endif
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body pln-card">
                                <h5><b>{{ $plan[0]['plan_name'] }}</b></h5>
                                @foreach ($plan[0]['get_sub_plans'] as $value)
                                    <p class="mt-4"> <b>Price:</b> ${{ $value['sp_amount'] }}/{{ $value['sp_name'] }}</p>
                                @endforeach
                                <h6>{{ $plan[0]['plan_desc'] }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card pln-pkgs">
                    <div class="card-body">
                        <div>
                            <h4>Card payment Details</h4>
                            @include('include.proceed_plan')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
