@extends('admin.layouts.adminpanel')

@section('title')
Khách hàng
@stop

@section('styles')

@stop

@section('content')
<div class="row clearfix">
    <div class="col-md-12 column">
        <table id="customers" class="table display table-striped table-hover compact">
            <thead>
                <tr>
                    <th class="col-md-1">{{ trans('admin/customers/table.customer_id') }}</th>
                    <th class="col-md-1">{{ trans('admin/customers/table.customer_account') }}</th>
                    <th class="col-md-4">{{ trans('admin/customers/table.customer_name') }}</th>
                    <th class="col-md-5">{{ trans('admin/customers/table.customer_address') }}</th>
                    <th class="col-md-1">{{ trans('admin/customers/table.action') }}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th class="col-md-1">{{ trans('admin/customers/table.customer_id') }}</th>--}}
                    {{--<th class="col-md-1">{{ trans('admin/customers/table.customer_account') }}</th>--}}
                    {{--<th class="col-md-4">{{ trans('admin/customers/table.customer_name') }}</th>--}}
                    {{--<th class="col-md-5">{{ trans('admin/customers/table.customer_address') }}</th>--}}
                    {{--<th class="col-md-1">{{ trans('admin/customers/table.action') }}</th>--}}
                {{--</tr>--}}
            {{--</thead>--}}
        </table>

    </div>
</div>

@stop

@section('scripts')

    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#customers').dataTable ({
//                "scrollY": 200,
//                "sDom": '<"top"lfip>rt<"bottom"ip<"clear">',
                "jQueryUI": true,
                "scrollCollapse": true,
                "sAjaxSource": "{{ URL::to('admin/customers/data') }}",
                "fnDrawCallback": function ( oSettings) {
                    $(".iframe").colorbox({iframe:true});
                }
            });


        });

    </script>
@stop