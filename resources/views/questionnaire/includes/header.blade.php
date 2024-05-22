<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <meta name="description" content="">
    <title>{{ $pageTitle }}</title>

    <link rel="stylesheet" href="{{ URL::asset('questionnaire/assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('questionnaire/assets/css/style.css') }}">
    <!-- Sweet Alert -->
    <link href="{{ URL::asset('admin-panel/assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('admin-panel/assets/css/toastr.css') }}" />

    <link rel="shortcut icon" href="{{ URL::asset('custom/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('questionnaire/assets/images/') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap"
        rel="stylesheet">

</head>

<header>
	<div class="main-header">
		<div class="container">
			<div class="menu-Bar">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="row align-items-center">
				<div class="col-md-3 text-left">
					<a href="https://stage234.devdesignbuild.com/" class="logo"><img src="{{ URL::asset('custom/assets/images/logo.png') }}" alt=""></a>
				</div>
				<div class="col-md-8 text-right">
					<div class="menuWrap">
						<ul class="menu">
							<li><a class="active" href="./">Home</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Plans / Solutions <span></span></a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#" class="searchIcon"><i class="fas fa-search"></i></a></li>
							<!-- <li><a href="#" class="btn btn-a">Request now</a></li>    -->
						</ul>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</header>
<script>
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("scrolled", window.scrollY > 0);
		if(window.scrollY > 0){
			
		}
    });
</script>
<body>
