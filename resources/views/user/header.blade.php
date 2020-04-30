<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='{{ asset('favicon.ico') }}' />
	<link rel="icon" href="{{ asset('favicon.ico') }}">

	{{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{ URL::to('/') }}">
	<meta name="author" content="Bangladesh Computer Council">
	<title>{{ config('app.name', 'NDC') }}</title>
	<meta name="robots" content="noindex, nofollow">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</head>