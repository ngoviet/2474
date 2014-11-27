@extends('admin.layouts.modal1')

@section('styles')
    <style>
        .form-control {
            /*max-width: 300px;*/
        }
        body {
            max-width: 600px;
        }
    </style>
@stop
@section('header')
    {{ $title }}
@stop
@section('content')

    <form role="form" method="post" action="@if (isset($city)){{ URL::to('admin/cities/' . $city->id . '/edit') }}@endif" autocomplete="off">

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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-horizontal col-md-12">
                            <div class="form-group {{{ $errors->has('id') ? 'error' : '' }}}">
                                <label class="text-right control-label col-md-4 col-xs-4" for="id">{{ trans('admin/cities/table.city_id') }}</label>
                                <div class="col-md-8 col-xs-8">
                                    <input class="form-control" name="id" id="id" type="text"  value="{{{ Input::old('id', isset($city) ? $city->id : null) }}}"/>
                                    {{{ $errors->first('id') }}}
                                </div>
                            </div>
                            <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                <label class="text-right control-label col-md-4 col-xs-4" for="name">{{ trans('admin/cities/table.city_name') }}</label>
                                <div class="col-md-8 col-xs-8">
                                    <input class="form-control" name="name" id="name" type="text"  value="{{{ Input::old('name', isset($city) ? $city->name : null) }}}"/>
                                    {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
                                </div>
                            </div>
                            <div class="form-group {{{ $errors->has('code') ? 'error' : '' }}}">
                                <label class="text-right control-label col-md-4 col-xs-4" for="code">{{ trans('admin/cities/table.city_code') }}</label>
                                <div class="col-md-8 col-xs-8">
                                    <input class="form-control" name="code" id="code" type="text"  value="{{{ Input::old('code', isset($city) ? $city->code : null) }}}"/>
                                    {{{ $errors->first('code', '<span class="help-block">:message</span>') }}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- City id -->
            {{--<div class="form-group {{{ $errors->has('id') ? 'error' : '' }}}">--}}
                {{--<div class="col-md-12">--}}
                    {{--<label class="control-label" for="id">{{ trans('admin/cities/table.city_id') }}</label>--}}
                    {{--<input class="form-control" type="text" name="id" id="id" value="{{{ Input::old('id', isset($city) ? $city->id : null) }}}" />--}}
                    {{--{{{ $errors->first('id', '<span class="help-block">:message</span>') }}}--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- ./ city id -->--}}

            {{--<!-- city name -->--}}
            {{--<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">--}}
                {{--<div class="col-md-12">--}}
                    {{--<label class="control-label" for="name">{{ trans('admin/cities/table.city_name') }}</label>--}}

                    {{--<input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name', isset($city) ? $city->name : null) }}"/>--}}
                    {{--{{{ $errors->first('name', '<span class="help-block">:message</span>') }}}--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group" {{{ $errors->has('code') ? 'error' : '' }}}>--}}
                {{--<div class="col-md-12">--}}
                    {{--<label class="control-label" for="code">{{ trans('admin/cities/table.city_code') }}</label>--}}
                    {{--<input class="form-control" type="text" name="code" id="code" value="{{ Input::old('code', isset($city) ? $city->code : null) }}"/>--}}
                    {{--{{{ $errors->first('code', '<span class="help-block">:message</span>') }}}--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- ./ content -->
        </div>
        <div class="panel-footer text-center">
            <button class="btn-info btn btn-sm close_popup"><i class="fa fa-ban"></i> Hủy bỏ</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i> Khôi phục</button>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle-o"></i> Cập nhật</button>
        </div>
    </form>

@stop
