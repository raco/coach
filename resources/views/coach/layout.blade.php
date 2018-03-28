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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <style>
        td .btn-xs {
            float: left;
            margin-right: 5px;
        }
    </style>
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
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
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
    <script>
        $(document).ready(function() {
            $.extend($.validator.messages, {
              extension: "Por favor ingrese una imagen.",
              required: "Este campo es obligatorio.",
              remote: "Por favor, rellena este campo.",
              email: "Por favor, escribe una dirección de correo válida",
              url: "Por favor, escribe una URL válida.",
              date: "Por favor, escribe una fecha válida.",
              dateISO: "Por favor, escribe una fecha (ISO) válida.",
              number: "Por favor, escribe un número entero válido.",
              digits: "Por favor, escribe sólo dígitos.",
              creditcard: "Por favor, escribe un número de tarjeta válido.",
              equalTo: "Por favor, escribe el mismo valor de nuevo.",
              accept: "Por favor, escribe un valor con una extensión aceptada.",
              maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
              minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
              rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
              range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
              max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
              min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
            });
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    @stack('scripts')
</body>

</html>

