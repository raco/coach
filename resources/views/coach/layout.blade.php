<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Coach</title>
    <link href= "{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href= "{{asset('awesome/css/awesome.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		@include('coach.partials.sidebar')

		<div id="page-wrapper" class="gray-bg dashbard-1">
			@include('coach.partials.header')

			@yield('content')
		</div>
	</div>
    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>

</html>

