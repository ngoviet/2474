@extends('admin.layouts.adminpanel')

@section('title')
 {{ $title }}
@stop

@section('styles')

@stop

@section('content')
    <div class="row">
            {{{ $title }}}
        <div class="pull-right">
            <a href="{{{ URL::to('admin/postions/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Tạo mới</a>
        </div>
    </div>
    <table id="positions" class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2">{{ trans('admin/positions/table.position_id') }}</th>
                <th class="col-md-4">{{ trans('admin/positions/table.position_name') }}</th>
                <th class="col-md-2">{{ trans('admin/positions/table.action') }}</th>
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
            oTable = $('#positions').dataTable ({
                "sAjaxSource": "{{ URL::to('admin/positions/data') }}",
                "fnDrawCallback": function ( oSettings) {
                    $(".iframe").colorbox({
                        iframe:true
                    });
                }
            });
        });
    </script>
@stop