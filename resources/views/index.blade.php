<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
		<link rel="icon" href="{{ asset('img/favicon.ico') }}">

		{{-- CSRF Token --}}
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="author" content="Bangladesh Computer Council">
		<title>{{ config('app.name', 'NDC') }}</title>
		<meta name="robots" content="noindex, nofollow">

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
		<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/script.js') }}"></script>
	</head>
	<body>
		<div class="sidenav">
			 <div class="login-main-text">
				<h2>Application<br> Login Page</h2>
				<p>Login or register from here to access.</p>
			 </div>
		  </div>
		  <div class="main">
			 <div class="col-md-6 col-sm-12">
				<div class="login-form">
				   <form>
					  <div class="form-group">
						 <label>User Name</label>
						 <input type="text" class="form-control" placeholder="User Name">
					  </div>
					  <div class="form-group">
						 <label>Password</label>
						 <input type="password" class="form-control" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-black">Login</button>
					  <button type="submit" class="btn btn-secondary">Register</button>
				   </form>
				</div>
			 </div>
		  </div>    <script type="text/javascript">
			</script>
	</body>
</html>
