<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>
</head>
<body>
<div class="container">
	@yield("content")
</div>
</body>
</html>