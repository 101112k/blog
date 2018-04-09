<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>@yield('title') - Striped by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
	</head>
	<body>

		<!-- Content -->
			<div id="content">
				<div class="inner">
					<h1>@yield('title')</h1>
					@yield('content')

					

				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="{{ url('/') }}">STRIPED</a></h1>
				
				@include('partials.nav')					
				@include('partials.search')					
				@include('partials.recent_posts')					
				@include('partials.calendar')					
							
				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{{ asset('js/jquery.min.js') }}"></script>
			<script src="{{ asset('js/skel.min.js') }}"></script>
			<script src="{{ asset('js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
			<script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>