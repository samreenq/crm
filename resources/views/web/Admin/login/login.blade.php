<!DOCTYPE html>
<html lang="en">
    @include('web.Admin.includes.login_header')
<body>

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0 " style="background: #7393B3 !important;    padding: 11px;">
                    <a href="#" class="logo logo-admin"><img src="{{URL::asset('custom/assets/images/logo.png')}}" height="100"  alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Welcome to Admin Panel !</h4>
                    <p class="text-muted text-center">Sign in to continue.</p>

                    <form class="form-horizontal m-t-30" action="{{route('admin.login.validate')}}" method="POST">
                        @csrf
                        @if($errors->any())
											{!! implode('', $errors->all('<div class="alert alert-danger" role="alert">*:message </div>')) !!}
										@endif
                        @include('include.es_msg')
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="text" class="form-control" id="userEmail" placeholder="Enter user email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        {{-- <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                        </div> --}}
                    </form>

                    <div class="m-t-40 text-center">
                        {{-- <p>Don't have an account ? <a href="pages-register.html" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p> --}}
                        <p>© 2023 Grace Karns <i class="mdi mdi-heart text-danger"></i> by Galaxy Web</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            {{-- <p>Don't have an account ? <a href="pages-register.html" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p> --}}

        </div>

    </div>


    @include('web.Admin.includes.login_footer')

</body>


</html>
