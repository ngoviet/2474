@extends('admin.layouts.adminpanel')

@section('title')
Thành phố
@stop

@section('styles')

@stop

@section('content')
    <div class="row">
            {{{ $title }}}
        <div class="pull-right">
            <a href="{{{ URL::to('admin/cities/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Tạo mới</a>
        </div>
    </div>
    <table id="cities" class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2">{{ trans('admin/cities/table.city_id') }}</th>
                <th class="col-md-4">{{ trans('admin/cities/table.city_name') }}</th>
                <th class="col-md-4">{{ trans('admin/cities/table.city_code') }}</th>
                <th class="col-md-2">{{ trans('admin/cities/table.action') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

@section('scripts')

    <script type="text/javascript">

        var oTable;
        $(document).ready(function() {
            oTable = $('#cities').dataTable ({
                "sAjaxSource": "{{ URL::to('admin/cities/data') }}",
                "fnDrawCallback": function ( oSettings) {
                    $(".iframe").colorbox({
                        iframe:true
                    });
                }
            });
        });
    </script>
@stop