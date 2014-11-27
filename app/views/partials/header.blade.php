<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Origin Admin - Bootstrap Admin Template">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Origin, Admin, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
{{ HTML::style('assets/ico/apple-touch-icon-144-precomposed.png', array('rel' => 'apple-touch-icon-precomposed', 'sizes' => '144x144')) }}
{{ HTML::style('assets/ico/apple-touch-icon-114-precomposed.png', array('rel' => 'apple-touch-icon-precomposed', 'sizes' => '114x114')) }}
{{ HTML::style('assets/ico/apple-touch-icon-72-precomposed.png', array('rel' => 'apple-touch-icon-precomposed', 'sizes' => '72x72')) }}
{{ HTML::style('assets/ico/apple-touch-icon-57-precomposed.png', array('rel' => 'apple-touch-icon-precomposed', 'sizes' => '57x57')) }}
{{ HTML::style('assets/ico/favicon.png', array('rel' => 'shortcut icon')) }}

<title>@yield('title')</title>



<!-- Bootstrap core CSS -->
{{ HTML::style('assets/css/bootstrap.min.css', array('id' => 'bootstrap-style')) }}

{{-- Combine CSS--}}
{{ HTML::style('assets/build/css/header.min.css') }}

{{--{{ HTML::style('assets/css/jquery.mmenu.css') }}--}}
{{ HTML::style('assets/css/font-awesome.min.css') }}

<!-- page css files -->
{{ HTML::style('assets/css/climacons-font.css') }}
{{ HTML::style('assets/css/glyphicons.css') }}
{{--{{ HTML::style('assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css') }}--}}
{{--{{ HTML::style('assets/plugins/fullcalendar/css/fullcalendar.css') }}--}}
{{--{{ HTML::style('assets/plugins/morris/css/morris.css') }}--}}
{{--{{ HTML::style('assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css') }}--}}


{{--chưa tối ưu--}}
{{--{{ HTML::style('assets/css/style.css') }}--}}
{{--{{ HTML::style('assets/css/add-ons.min.css') }}--}}

<!-- Themes -->
{{--{{ HTML::style('assets/css/themes.min.css') }}--}}
{{--{{ HTML::style('assets/angular/angular-csp.css') }}--}}
{{--{{ HTML::style('assets/me/ui-grid/ui-grid.css') }}--}}
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

{{ HTML::script('node_modules/angular/angular.min.js') }}
{{ HTML::script('node_modules/angular-bootstrap/ui-bootstrap.js') }}