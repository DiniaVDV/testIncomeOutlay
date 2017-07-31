<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Доходы/Расходы</title>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
		
		$.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$( function() {
			$( "#datepicker1" ).datepicker();
			$( "#anim" ).on( "change", function() {
				$( "#datepicker1" ).datepicker( "option", "showAnim", $( this ).val() );
			});
		} );
    </script>
</head>
<body>
