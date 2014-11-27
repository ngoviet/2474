<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials/header')

{{--    {{ HTML::style('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}--}}
    {{--{{ HTML::style('assets/plugins/modal/css/component.css') }}--}}
    {{--{{ HTML::script('assets/plugins/modal/js/modernizr.custom.js') }}--}}

    @yield('styles')
  </head>

  <body>
    {{--@include('partials/rightbar')--}}
    @include('partials/nav')

    @include('partials/sidebaradmin')

    <!-- Notifications -->
    @include('notifications')
    <!-- ./ notifications -->

    <div class="main ">
      <div class="row">
        @yield('content')
      </div>
    </div>

    @include('partials/footer')
    @include('partials/usage')
    @include('partials/scripts')


    {{--{{ HTML::script('assets/js/pages/ui-modals.js') }}--}}
    {{ HTML::script('assets/plugins/colorbox/jquery.colorbox-min.js') }}

    {{ HTML::script('assets/plugins/jquery-cookie/jquery.cookie.min.js') }}
    {{ HTML::script('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/plugins/datatables/media/js/dataTables.bootstrap.js') }}
    {{ HTML::script('assets/plugins/datatables/media/js/datatables.fnReloadAjax.js') }}



    <script type="text/javascript">
        $.extend($.fn.dataTable.defaults, {
            // "serverSide": true,
//            "processing": true,
//            "jqueryUI": true,
//            "paging": false,
//             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
             "language": {
                "url": "../assets/plugins/datatables/media/language/vietnamese.json"
             }
        });

//        $.colorbox.settings.close = 'Đóng';
//        $.colorbox.settings.current = 'Ảnh {current} của {total}';
//        $.colorbox.settings.previous = 'Trước';
//        $.colorbox.settings.next = 'Sau';
//        $.colorbox.settings.xhrError = 'Không thể tải nội dung';
//        $.colorbox.settings.imgError = 'Không thể tải ảnh';
//        $.colorbox.settings.innerWidth = "1300";
//        $.colorbox.settings.innerHeight = '90%';

    </script>

    @yield('scripts')

  </body>
</html>