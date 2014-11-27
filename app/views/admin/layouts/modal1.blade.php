<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            @section('title')
                {{{ $title }}} :: Administration
            @show
        </title>

        <meta name="keywords" content="@yield('keywords')" />
        <meta name="author" content="@yield('author')" />
        <!-- Google will often use this as its description of your page/site. Make it good. -->
        <meta name="description" content="@yield('description')" />

        <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
        <meta name="google-site-verification" content="">

        <!-- Dublin Core Metadata : http://dublincore.org/ -->
        <meta name="DC.title" content="2472">
        <meta name="DC.subject" content="@yield('description')">
        <meta name="DC.creator" content="@yield('author')">

        <!--  Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK
         - see wikipedia for info on browser support: http://mky.be/favicon/ -->
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

        <!-- CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-style">
        <link href="{{ asset('assets/css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/modal/css/component.css') }}" rel="stylesheet">

        {{ HTML::style('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}
        {{ HTML::style('assets/plugins/datatables/media/css/jquery.dataTables.min.css') }}

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" id="main-style">
        <link href="{{ asset('assets/css/add-ons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/themes.min.css') }}" rel="stylesheet">

        {{ HTML::style('assets/plugins/colorbox/example4/colorbox.css') }}
        <style type="text/css">
            .panel {
                margin-bottom: auto;
            }
        </style>

        @yield('styles')

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Asynchronous google analytics; this is the official snippet.
         Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-31122385-3']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script> -->

    </head>

    <body>

            <div class="panel panel-default">
                <div class="form-group">
                    @include('notifications')
                    @yield('content')
                </div>
            </div>

            <!-- Javascripts -->
        {{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}

        {{ HTML::script('assets/plugins/modal/js/modernizr.custom.js') }}
        {{ HTML::script('assets/plugins/modal/js/jquery.modalEffects.js') }}
        {{ HTML::script('assets/plugins/modal/js/modalEffects.js') }}

        {{ HTML::script('assets/js/pages/ui-modals.js') }}
        {{ HTML::script('assets/plugins/jquery-cookie/jquery.cookie.min.js') }}

        <!-- page scripts -->
        {{ HTML::script('assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js') }}
        {{--{{ HTML::script('assets/plugins/modal/js/jquery.modalEffects.js') }}--}}
        {{--{{ HTML::script('assets/plugins/modal/js/cssParser.js') }}--}}
        <!-- theme scripts -->
        {{ HTML::script('assets/js/jquery.mmenu.min.js') }}
        {{ HTML::script('assets/js/core.min.js') }}

        {{ HTML::script('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}
        {{ HTML::script('assets/plugins/datatables/media/js/dataTables.bootstrap.js') }}
        {{ HTML::script('assets/plugins/datatables/media/js/datatables.fnReloadAjax.js') }}
        {{ HTML::script('assets/plugins/colorbox/jquery.colorbox-min.js') }}

        <script type="text/javascript">
            $(document).ready(function(){
                parent.$.colorbox.resize({
                    innerWidth:$('body').width(),
                    innerHeight:$('body').height()
                });

                $('.close_popup').click(function(){
                    parent.oTable.fnReloadAjax();
                    parent.jQuery.fn.colorbox.close();
                    return false;
                });

                $('#deleteForm').submit(function(event) {
                    var form = $(this);
                    $.ajax({
                            type: form.attr('method'),
                            url: form.attr('action'),
                            data: form.serialize()
                        }).done(function() {
                            parent.jQuery.colorbox.close();
                            parent.oTable.fnReloadAjax();
                            }).fail(function() {
                        });
                        event.preventDefault();
                    });

            });
        </script>
        @yield('scripts')
    </body>
</html>
