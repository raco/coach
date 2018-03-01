<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Administrador</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href= "{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href= "{{asset('awesome/css/awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  

</head>
<body>
	<div id="wrapper">

		@include('admin.partials.sidebar')
		
		<div id="page-wrapper" class="gray-bg dashbard-1">
			@include('admin.partials.header') 

			@yield('content')

			{{-- @include('admin.partials.footer') --}}
		</div>

	</div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    @stack('scripts')
</body>

</html>

