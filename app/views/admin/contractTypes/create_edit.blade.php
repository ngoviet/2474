@extends('admin.layouts.modal1')

@section('styles')
@stop
@section('header')
    {{ $title }}
@stop
@section('content')

    <form class="form-group" method="post" action="@if (isset($city)){{ URL::to('admin/cities/' . $city->id . '/edit') }}@endif" autocomplete="off">

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
            <!-- City id -->
            <div class="form-group {{{ $errors->has('id') ? 'error' : '' }}}">
                <div class="col-md-12">
                    <label class="control-label" for="id">{{ trans('admin/cities/table.city_id') }}</label>
                    <input class="form-control" type="text" name="id" id="id" value="{{{ Input::old('id', isset($city) ? $city->id : null) }}}" />
                    {{{ $errors->first('id', '<span class="help-block">:message</span>') }}}
                </div>
            </div>
            <!-- ./ city id -->

            <!-- city name -->
            <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                <div class="col-md-12">
                    <label class="control-label" for="name">{{ trans('admin/cities/table.city_name') }}</label>

                    <input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name', isset($city) ? $city->name : null) }}"/>
                    {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
                </div>
            </div>

            <div class="form-group" {{{ $errors->has('code') ? 'error' : '' }}}>
                <div class="col-md-12">
                    <label class="control-label" for="code">{{ trans('admin/cities/table.city_code') }}</label>
                    <input class="form-control" type="text" name="code" id="code" value="{{ Input::old('code', isset($city) ? $city->code : null) }}"/>
                    {{{ $errors->first('code', '<span class="help-block">:message</span>') }}}
                </div>
            </div>
            <!-- ./ content -->
        </div>
        <div class="panel-footer">
            <button class="btn-info btn btn-sm close_popup"><i class="fa fa-ban"></i> Cancel</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i> Reset</button>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle-o"></i> Update</button>
        </div>
    </form>

@stop
