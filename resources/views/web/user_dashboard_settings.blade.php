@extends('web.dashboard-panel')
@push('css')
    <style>
    span.badge.badge-secondary {
    background: #505050;
    font-size: 15px;
    padding: 9px 22px;
    margin-bottom: -8px;
}
        .package-detail {
            margin-top: 30px;
            font-style: italic;
            font-weight: 500;
            text-align: left;
            font-size: 17px;
            margin-bottom: 20px;
        }

        #unsubscribe-user-package {
            color: #fff;
            background-color: #7393B3;
            border-color: #7393B3;
            display: flex;
            justify-content: center;
        }

        .card-body {
            padding: 20px 0px 8px 0px !important;
        }

        .border-success {
            border-color: #7393B3 !important;
        }

        .btn-primary {
            border-color: #7393B3 !important;
        }

        label {
            margin-bottom: 4px;
        }
    </style>
@endpush
@section('dynamic-dashboard-data')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="main-view0-card">
                    <div class="row mb-3 welcome-card ">
                        <p class=""> Profile Information</p>
                    </div>
                </div>
                <div class="container mt-2">
                    <form method="post" action="{{ route('user.update-profile') }}">
                        @csrf
                        <div class="row">
                            @include('include/es_msg')
                            @if ($errors->any())
                                {!! implode(
                                    '',
                                    $errors->all('<div id="userHelp" class="form-text text-muted" style="color:red !important">*:message </div>'),
                                ) !!}
                            @endif
                            <div class="col-md-12 mt-2 ">
                                @php
                                    $name = session()->get('userName');
                                    $email = session()->get('userEmail');
                                @endphp
                                <x-inputField label='user_name' labelCaption="Enter Name" id="user_name" type="text"
                                    name="name" placeholder="Enter Name" :inputData="$name" />
                            </div>

                            <div class="col-md-12 ">
                                <x-inputField label='user_name' labelCaption="Enter Email" id="user_name" type="text"
                                    name="email" placeholder="Enter Email" :inputData="$email" />
                            </div>

                            <div class="col-md-12 ">
                                <x-inputField label='user_name' labelCaption="Enter Password" id="user_name" type="password"
                                    name="password" />
                            </div>
                            <div class="col-md-12 ">
                                <x-inputField label='user_name' labelCaption="Enter Password Again" id="user_name"
                                    type="password" name="password_confirmation" />
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group text-right">
                                    <div class="form-control-wrap">
                                        <button type="submit" class="btn btn-primary"
                                            style="background:#7393B3; color:#fff" id="update-customer">Update
                                            Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (session()->get('accountType') == 'paid')
                <div class="col-md-12 col-sm-12 mt-3">
                    <div class="main-view0-card">
                        <div class="row mb-3 welcome-card ">
                            <p class=""> Package Information</p>
                        </div>
                    </div>
                    <div class="container mt-2">
                        <p class="package-detail"> You are currently subscribed to
                            <b>{{ session()->get('planName') }}</b>
                            {{ session()->get('packageType') }}
                        </p>
                        @if (session()->get('planStatus') == 0)
                            <p class="package-detail">If you want to unsubscribe this package, click the button below
                            </p>
                            <a href="" id="unsubscribe-user-package" class="btn btn-primary text-center">Unsubscribe
                            @else
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header text-white" style="background-color:#7393B3">
                                                You have unsubscribed from this package
                                            </div>
                                            <div class="p-3 d-flex align-items-center">
                                                <p class="card-text mr-2">The last date of this package's expiry is:</p>
                                                <h4 class="card-title justify-content-center ">
                                                    <span class="badge badge-secondary">
                                                        {{ date('d-M-Y', strtotime(session()->get('expiryDate'))) }}
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                        @endif
                        </a>
                    </div>
                </div>
        </div>
        @endif
    </div>

@endsection


