<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title> {{ $pageTitle }}</title>

    <link rel="stylesheet" href="{{ URL::asset('admin-panel/assets/css/icons.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('admin-panel/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin-panel/assets/css/preloader.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin-panel/assets/css/toastr.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('custom/assets/css/layout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('custom/assets/css/login.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('custom/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('custom/assets/css/responsive.css') }}" />
    <link href="{{ URL::asset('admin-panel/assets/plugins/select2/css/select2.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Sweet Alert -->
    <link href="{{ URL::asset('admin-panel/assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Table css -->
    <link href="{{ URL::asset('admin-panel/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}"
        rel="stylesheet" type="text/css" media="screen">

    <link rel="shortcut icon" href="{{ URL::asset('custom/assets/images/footer-icon.JPG') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('custom/assets/images/favicon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>

<body>
    @php
        $routeName = Route::currentRouteName();
    @endphp
    <header @if($routeName=="user.login" || $routeName == 'plan.essence' ||
    $routeName == 'plan.growth' ||
    $routeName == 'plan.flourish' )@else style="position: relative" @endif >
        <div class="main-header" id="myDiv">
            <div class="container">
                <div class="menu-Bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-3 text-left">
                        <a href="https://stage234.devdesignbuild.com/" class="logo">
                            <img src="{{ URL::asset('custom/assets/images/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class="menuWrap">
                            <ul class="menu">
                                <li><a class="active" href="https://stage234.devdesignbuild.com/">Home</a></li>

                                <!-- <li><a href="#"> </a></li> -->
                                <li><a class="chev" href="#">Company</a>
                                    <ul class="dropdown">
                                        <li><a href="https://stage234.devdesignbuild.com/about-us-3/">About US</a></li>
                                        <li><a href="https://stage234.devdesignbuild.com/web-founder/">Web Founder</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="chev" href="#">Solutions</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route("plan.essence") }}">Essence Package</a></li>
                                        <li><a href="{{ route("plan.growth") }}">Growth Package</a></li>
                                        <li><a href="{{ route("plan.flourish") }}">Flourish Package</a></li>
                                    </ul>
                                </li>
                                @if (session()->get('userId') == '')
                                    <li><a href="{{route('user.login')}}">Login / Register</a></li>
                                @else
                                    <li><a class="chev" href="#">{{ session()->get('userName') }}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route("user.dashboard") }}">Dashboard</a></li>
                                            <li><a href="{{ route("user.logout") }}">Logout</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @if (
        $routeName == 'plan.essence' ||
            $routeName == 'plan.growth' ||
            $routeName == 'plan.flourish'
           )
    @elseif ($routeName=="user.login")
        <section class="login-sec1">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="login-sec1-wrapper">
                            <h2>
                                {{ $pageTitle }}
                            </h2>
                            <p>
                                @if (isset($pageDesc))
                                    {{ $pageDesc }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{ $pageTitle }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Login/Logout Section -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          @if (session()->get('userId') == '')
            <a class="nav-link" href="{{route('user.login')}}">Login</a>
          @else
            <a class="nav-link" href="#">{{ session()->get('userName') }}</a>
          @endif
        </li>


      </ul>
    </div>
  </nav> --}}
