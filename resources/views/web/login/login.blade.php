@extends('layout')








@section('body_container')
<style>
.login-wrapper p {
    text-align: left !important;
}
.login-form p {
    margin-bottom: 15px;
    color: #000000;
    font-size: 16px;
    line-height: 22px;
    font-style: italic;
    font-weight: 500;
}
</style>
    <section class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="register-wrapper login-card">
                        <h2>
                            Register
                        </h2>
                        <div class="row">
                            @if ($errors->any())
                                <div class="alert alert-danger " style="width: 100%" role="alert">

                                    {!! implode('', $errors->all('<li id="userHelp" style="width:100%">:message </li>')) !!}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('user.save-register') }}">
                            @csrf
                            <div class="inp-field-wrap">
                                <label>Full Name <span>*</span> </label>
                                <input class="form-control mb-3" type="text" name="name"
                                    placeholder="Please enter your name">

                                <label>Email Address <span>*</span> </label>
                                <input class="form-control mb-3" type="email" name="email"
                                    placeholder="Please enter your Email">

                                <label>Password <span>*</span> </label>
                                <input class="form-control mb-3" type="password" name="password"
                                    placeholder="Please enter your Password">
                            </div>


                            <p>
                                Your personal data will be used to support your experience throughout this website, to
                                manage
                                access to your account, and for other purposes described in our privacy policy.
                            </p>

                            <a href="">
                                <button class="btn " type="submit">
                                    Register
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="login-wrapper login-card">
                        <h2>
                            LOGIN
                        </h2>
                        @include('include.es_msg')
                        <form method="POST" action="{{ route('user.login.check') }}">
                            @csrf
                            <div class="inp-field-wrap">
                                <label>Enter Email<span>*</span> </label>
                                <input class="form-control mb-3 " name="email" type="text"
                                    placeholder="Please enter Email">

                                <label>Enter Password <span>*</span> </label>
                                <input class="form-control inpSp" name="password" type="password"
                                    placeholder="Please enter Password">
                            </div>

                            <p>
                                Registering for this site allows you to access your order status and history. Just fill in
                                the
                                fields below, and we'll get a new account set up for you in no time. <br> <br> We will only ask you
                                for
                                information necessary to make the purchase process faster and easier.
                            </p>


                            <div class="">
                                <div class="form-group mx-auto">
                                    <button class="btn" style="margin-top: 24px;" type="submit">Login</button>
                                    {{-- <a class="small text-black-50 pl-2 ml-2 border-left" href="">Forgot Password ?</a> --}}
                                </div>
                            </div>

                            {{-- <div class="">

                                    <button class="btn "  type="submit">Login</button>

                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
