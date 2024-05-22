@include('include.header')
@include('include.login_header')
<div class="container">
    <div class="row mt-5">
        <div class="spContainer mx-auto">
            <div class="card px-4 py-5 border-0 shadow">
                <div class="d-inline text-center mb-3">
                    <h3 class="font-weight-bold">Register</h3>

                </div>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger " style="width: 100%" role="alert">

                            {!! implode('', $errors->all('<li id="userHelp" style="width:100%">:message </li>')) !!}
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('user.save-register') }}">
                    @csrf
                    <div class="d-inline text-center mb-0">
                        <div class="form-group mx-auto">
                            <input class="form-control inpSp" type="text" name="name"
                                placeholder="Please enter your name">
                        </div>
                    </div>
                    <div class="d-inline text-center mb-3">
                        <div class="form-group mx-auto">
                            <input class="form-control inpSp" type="email" name="email"
                                placeholder="Please enter your Email">
                        </div>
                    </div>
                    <div class="d-inline text-center mb-3">
                        <div class="form-group mx-auto">
                            <input class="form-control inpSp" type="password" name="password"
                                placeholder="Please enter your Password">
                        </div>
                    </div>
                    <div class="d-inline text-center mb-3">
                        <div class="form-group mx-auto">
                            <button class="btn btn-primary" type="submit">Register</button>
                            {{-- <a class="small text-black-50 pl-2 ml-2 border-left" href="">Forgot Password ?</a> --}}
                        </div>
                    </div>
                </form>
                <div class="d-inline text-center mt-3">
                    <div class="form-group mx-auto mb-0">
                        <a class="text-black font-weight-bold regStr" href="{{ route('user.login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include.footer')
@if (session('jsonMessage') != '')
    <script>
        jsonMessage("{{ session('response') }}", "{{ session('message') }}");
    </script>
@endif
