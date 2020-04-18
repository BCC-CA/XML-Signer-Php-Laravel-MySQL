<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='shortcut icon' type='image/x-icon' href='{{ asset('favicon.ico') }}' />
		<link rel="icon" href="{{ asset('favicon.ico') }}">

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
					<form action="{{url('post-login')}}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
							@if ($errors->has('email'))
								<span class="error">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
							@if ($errors->has('password'))
								<span class="error">{{ $errors->first('password') }}</span>
							@endif
						</div>
						{{--
						<button type="submit" class="btn btn-black">Login</button>
						<button type="submit" class="btn btn-secondary">Register</button>
						--}}
						<button class="btn btn-lg btn-black btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
						<div class="text-center">
							If you have an account?
							<a class="small" href="{{url('registration')}}">Sign Up</a>
						</div>
					</form>
				</div>
			 </div>
		  </div>    <script type="text/javascript">
			</script>
	</body>
</html>
