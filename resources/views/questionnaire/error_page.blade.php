
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{URL::asset('forbid_assests/css/style.css')}}" rel="stylesheet" />
<title>404 Error</title>





<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<meta name="robots" content="noindex, follow">
</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>Oops!</h1>
@if(!empty($status))
   <h2>You Company's Status is {{ $status }} </h2>
@else
<h2>No Such Company exists</h2>

@endif

</div>
<a href="{{ url('/') }}">Please, Subscribe to the Questionnaire</a>
</div>
</div>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
