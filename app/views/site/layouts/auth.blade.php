<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="247 manager">
    <meta name="author" content="vietnd">
    <meta name="keyword" content="247, team, vntracking, VNPT-Tracking">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('assets/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('assets/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ url('assets/ico/apple-touch-icon-57-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ url('assets/ico/favicon.png') }}">
    
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
{{--    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-style">--}}
    {{--{{ HTML::style('assets/css/bootstrap.min.css') }}--}}

  
    <!-- Remove following comment to add Right to Left Support or add class rtl to body -->
    <!-- <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet"> -->
    
    <!-- <link href="assets/css/jquery.mmenu.css" rel="stylesheet"> -->
    {{--{{ HTML::style('assets/css/jquery.mmenu.css') }}--}}
    {{ HTML::style('assets/build/css/auth.min.css') }}
    {{ HTML::style('assets/css/font-awesome.min.css') }}
    
    <!-- page css files -->
    <!-- <link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet"> -->
{{--    {{ HTML::style('assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css') }}--}}
    <style>
      footer, #usage {
        display: none;
      }
    </style>  

      <!-- Custom styles for this template -->
      {{--{{ HTML::style('assets/css/style.css', array('id'=>'main-style')) }}--}}
    {{--{{ HTML::style('assets/css/add-ons.min.css') }}--}}
    <!-- Themes -->
      {{--{{ HTML::style('assets/css/themes.min.css') }}--}}
    
    <!-- Remove following comment to add Right to Left Support or add class rtl to body -->
    <!-- <link href="assets/css/style.rtl.min.css" rel="stylesheet"> -->

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>

  <body class="login">
    <div class="container">
      <div class="login-box col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
        @yield('content')
      </div>
    </div>
    
    <footer>

      <!-- <div class="row"> -->

        <!-- <div class="col-sm-5"> -->
          &copy; 2014 Tổ ĐH $ LĐ DV VNPT-Tracking <a href="http://vnpttracking.vn">VNPT-Tracking website</a>
        <!-- </div> -->

        <!-- <div class="col-sm-7 text-right">
          Powered by: <a href="http://bootstrapmaster.com/demo/origin/" alt="Bootstrap Admin Templates">Origin Admin</a> | Based on Bootstrap 3.2.0 | Built with brix.io <a href="http://brix.io" alt="Brix.io - Bootstrap Builder">Bootstrap Builder</a>
        </div> --><!--/.col-->  

      <!-- </div> --><!--/.row-->  

    </footer>


    <!-- start: JavaScript-->
    <!--[if !IE]>-->
        {{ HTML::script('assets/build/js/auth.notIE.min.js') }}
    <!--<![endif]-->
    <!--[if IE]>
        {{ HTML::script('assets/build/js/auth.IE.min.js') }}
    <![endif]-->

  </body>
</html>