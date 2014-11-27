@extends('admin.layouts.modal1')
@section('header')
    {{ trans('admin/customers/title.customer_update') }}
@stop
@section('styles')
    <style>
        body {
            max-width: 998px;
        }
        /*.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {*/
            /*padding-left: 5px;*/
            /*padding-right: 5px;*/
        /*}*/
        .form-horizontal  {
            padding-left: 5px;
        }
        .form-control , .control-label {
            font-size: 11px;
            height: auto;
            padding-left: 5px;
        }
    </style>
@stop
@section('scripts')
    <script>

    </script>
@stop
@section('content')
    <form role="form"  method="post" action="@if (isset($customer)){{ URL::to('admin/customers/' . $customer->id . '/edit') }}@endif" autocomplete="off">
    		<!-- CSRF Token -->
    		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    		<!-- ./ csrf token -->

        <div class="panel-heading">
            <h2><strong>@yield('header')</strong></h2>
            <div class="pull-right">
                <button class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
            </div>
        </div>
        <div class="panel-body">
            @include('admin.customers.details')
        </div>
        <div class="panel-footer text-center">
            <button class="btn btn-info btn-sm close_popup"><i class="fa fa-ban"></i> Hủy</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i> Khôi phục</button>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle-o"></i> Lưu</button>
        </div>
    </form>
@stop
