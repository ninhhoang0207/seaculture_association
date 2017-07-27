<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') | @lang('general.title')</title>
	@yield('header')
	<!-- Bootstrap library-->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Font-awsome -->
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Bootstrap library-->
	<link href="{{asset('css/nprogress.css')}}" rel="stylesheet">
	<!-- Select 2 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
	<!-- Swtich button -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
	<!-- Check button -->
	<link rel="stylesheet" type="text/css" href="{{ asset('iCheck/skins/flat/green.css') }}">
	<!-- Custom Theme Style -->
	<link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			@include('includes/sidebar_menu')
			@include('includes/top_menu')
			<!-- page content -->
			<div class="right_col" role="main">
				@yield('content')
			</div>
		</div>
	</div>
</body>
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Moment -->
<script src="{{asset('js/moment.min.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('js/nprogress.js')}}"></script>
<!-- Select 2 -->
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<!-- Switch button -->
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<!-- Checkbox -->
<script type="text/javascript" src="{{ asset('iCheck/icheck.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
@stack('scripts')
</html>
