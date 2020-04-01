<!doctype html>
<html lang="en">
	@include('user.header')
	<body>
		@include('user.navbar')

		<main role="main" class="container">
			<!-- @yield('content') -->
			@section('content')
				<div class="jumbotron">
					<h1>Navbar example</h1>
					<p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
					<a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
				</div>
			@show
		</main>
		@include('user.footer')
	</body>
</html>