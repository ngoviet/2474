@extends('admin.layouts.adminpanel')

@section('title')
Thành phố
@stop

@section('styles')
    {{ HTML::style('assets/plugins/modal/css/component.css') }}
@stop

@section('content')

    <div class="row">
            {{{ $title }}}
        <div class="pull-right">
            <a class="btn btn-default btn-xs md-trigger" data-modal="cityModal">Delete</a>
            <a href="{{{ URL::to('admin/cities/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Tạo mới</a>
        </div>
    </div>
    <table id="cities" class="table table-bordered table-condensed" style="background-color: #ffffff">
        <thead>
            <tr>
                <th>{{ trans('admin/cities/table.city_id') }}</th>
                <th>{{ trans('admin/cities/table.city_name') }}</th>
                <th>{{ trans('admin/cities/table.city_code') }}</th>
                <th>{{ trans('admin/cities/table.action') }}</th>
            </tr>
        </thead>
    </table>
    @include('admin/cities/modal')
    <div class="md-overlay"></div><!-- the overlay element -->

@stop

@section('scripts')
    {{--{{ HTML::script('assets/plugins/modal/js/classie.js') }}--}}
    {{ HTML::script('assets/plugins/modal/js/jquery.modalEffects.js') }}
    {{--{{ HTML::script('assets/js/pages/ui-modals.js') }}--}}

    {{-- Tạo hiệu ứng blur --}}
    {{--<script>--}}
        {{--// this is important for IEs--}}
        {{--var polyfilter_scriptpath= '../../assets/plugins/modal/js/';--}}
    {{--</script>--}}

    {{--{{ HTML::script('assets/plugins/modal/js/cssParser.js') }}--}}
    {{--{{ HTML::script('assets/plugins/modal/js/css-filters-polyfill.js') }}--}}

    <script type="text/javascript">

        var oTable;
        $(document).ready(function() {
            oTable = $('#cities').dataTable ({
//                "bProcessing": true,
//                "bServerSide": true,
//                "bJqueryUI": true,
//                "bStateSave": true,
                "sAjaxSource": "{{ URL::to('admin/cities/data') }}",
                "fnDrawCallback": function (){
                    $('.md-trigger').modalEffects();
                }
            });
            $('body').on('click','.md-trigger',function(e){
                var cityId = $(this).data('id');
                getDataById(cityId);
            });

            $('body').on('click', '#update', function(e){
                updateCity();
            });
        });

        function getDataById(id){
            $.ajax({
                url: "{{ URL::to('admin/cities/data-by-id') }}/" + id,
                success: function(data){
                    bindingData(data);
                }
            });
        }

        function bindingData(data){
            $('#id').val(data['id']);
            $('#name').val(data['name']);
            $('#code').val(data['code']);
        }

        function updateCity()
        {
            var data = {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    code: $('#code').val()
                    };
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{ URL::to('admin/cities/'.  .'edit') }}"--}}
            {{--});--}}
        }

    </script>

@stop