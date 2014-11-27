<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			2472 App
			@show
		</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Origin Admin - Bootstrap Admin Template">
		<meta name="author" content="Łukasz Holeczek">
		<meta name="keyword" content="Origin, Admin, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('assets/ico/apple-touch-icon-144-precomposed.png')}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('assets/ico/apple-touch-icon-114-precomposed.png')}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('assets/ico/apple-touch-icon-72-precomposed.png')}}">
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{url('assets/ico/apple-touch-icon-57-precomposed.png')}}">
		<link rel="shortcut icon" href="{{url('assets/ico/favicon.png')}}">
		<!-- Bootstrap core CSS -->
	    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-style">
	
		<!-- Remove following comment to add Right to Left Support or add class rtl to body -->
		<!-- <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet"> -->
		
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- page css files -->
		<link href="assets/css/climacons-font.css" rel="stylesheet">
		
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet"><!-- 
		<link href="assets/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet">
		<link href="assets/plugins/morris/css/morris.css" rel="stylesheet">
		<link href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet"> -->

	    <!-- Custom styles for this template -->
	    <link href="assets/css/style.css" rel="stylesheet" id="main-style">
		<link href="assets/css/add-ons.min.css" rel="stylesheet">
		
		<!-- Themes -->
	    <link href="assets/css/themes.min.css" rel="stylesheet">
		
		<!-- Remove following comment to add Right to Left Support or add class rtl to body -->
		<!-- <link href="assets/css/style.rtl.min.css" rel="stylesheet"> -->

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

		<style>
        body {
            padding: 60px 0;
        }
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-inverse navbar-fixed-top">
			 <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
					</ul>

                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::check())
                        @if (Auth::user()->hasRole('admin'))
                        <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
                        <li><a href="{{{ URL::to('user/index') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
                        <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                        @else
                        <li {{ (Request::is('users/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                        <li {{ (Request::is('users/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                        @endif
                    </ul>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container">
	        <p class="muted credit">Laravel 4 Starter Site on <a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site">Github</a>.</p>
	      </div>
	    </div>

		<!-- start: JavaScript-->
		<!--[if !IE]>-->

				<script src="assets/js/jquery-2.1.1.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
		
			<script src="assets/js/jquery-1.11.1.min.js"></script>
		
		<![endif]-->

		<!--[if !IE]>-->

			<script type="text/javascript">
				window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
			</script>

		<!--<![endif]-->

		<!--[if IE]>
		
			<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
			</script>
			
		<![endif]-->
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		
		
		<!-- page scripts -->
		/*<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>*/
		<script src="assets/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
		/*<script src="assets/plugins/moment/moment.min.js"></script>*/
		/*<script src="assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>*/
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="assets/plugins/excanvas/excanvas.min.js"></script>
		<![endif]-->
		/*<script src="assets/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.stack.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.spline.min.js"></script>
		<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="assets/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/plugins/morris/js/morris.min.js"></script>
		<script src="assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
		<script src="assets/plugins/jvectormap/js/gdp-data.js"></script>
		<script src="assets/plugins/gauge/gauge.min.js"></script>*/
		
		/*<!-- theme scripts -->
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script src="assets/js/pages/index.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>*/
		
		<!-- end: JavaScript-->

	        @yield('scripts')
	</body>
</html>
