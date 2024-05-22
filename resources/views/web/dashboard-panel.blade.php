@extends('layout')

@section('dashboard-data')
    @yield('dynamic-dashboard-data')
@endsection


@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.plans-submenu').hide();
            $('#plans-menu').click(function() {
                $('.plans-submenu').slideToggle();
            });
        });
    </script>
@endpush
@include("questionnaire.includes.questionaire-modal")
@include("questionnaire.includes.edit-user-company-modal")
@include("web.meetings.includes.create-meeting-request-modal")
@section('body_container')
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-3">
                    <div class="dash-info">
                        <img src="" alt="">
                        <h6>{{ session()->get('userName') }}</h6>
                        <p>{{ session()->get('userEmail') }}</p>
                    </div>
                    @php
                        $routeName = Route::currentRouteName();
                    @endphp
                    <div class="dash-items">
                        <ul class="aiz-side-nav-list px-2 metismenu" data-toggle="aiz-side-menu">

                            <li class="aiz-side-nav-item @if ($routeName == 'user.dashboard') {{ 'mm-active' }} @endif ">
                                <a href="{{ route("user.dashboard") }}">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="aiz-side-nav-text">Dashboard</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item" id="plans-menu">
                                <a href="#">
                                    <i class="fa-solid fa-credit-card"></i>
                                    <span class="aiz-side-nav-text">Plans</span>
                                    <i class="fas fa-caret-down right-icon"></i>
                                </a>
                                <ul class="submenu plans-submenu">
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('plan.essence') }}">
                                            <span class="aiz-side-nav-text">Essence Package</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('plan.growth') }}">
                                            <span class="aiz-side-nav-text">Growth Package</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('plan.flourish') }}">
                                            <span class="aiz-side-nav-text">Flourish Package</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="aiz-side-nav-item @if ($routeName == 'user.dashboard.purchase-history') {{ 'mm-active' }} @endif">
                                <a href="{{ route('user.dashboard.purchase-history') }}">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    <span class="aiz-side-nav-text">Purchase History</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item @if ($routeName == 'user.dashboard.settings') {{ 'mm-active' }} @endif">
                                <a href="{{ route("user.dashboard.settings") }}">
                                    <i class="fa-solid fa-gears"></i>
                                    <span class="aiz-side-nav-text">Settings</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item ">
                                <a href="{{ route('user.logout') }}">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span class="aiz-side-nav-text">Logout</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 mb-3">
                    <div class="card shadow">
                        <div class="card-body" style="padding: 20px 15px 10px 15px">
                            <div class="main-view0-card" >

                                @yield('dynamic-dashboard-data')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
