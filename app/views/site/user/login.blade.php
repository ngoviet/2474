@extends('site.layouts.auth')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="header">
    <h1>Xin chào</h1>
</div>

<form method="POST" action="{{{ URL::to('/user/login') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        <div class="form-group first">
            <div class="input-group col-sm-12">
                <!-- <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label> -->
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            </div>
        </div>
        <div class="form-group last">
            <div class="input-group col-sm-12">
                <!-- <label for="password">
                    {{{ Lang::get('confide::confide.password') }}}
                    <small>
                        <a href="{{{ URL::to('/user/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                    </small>
                </label> -->
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
            </div>
        </div>
        <!-- <div class="form-group last">
            <label for="remember" >{{{ Lang::get('confide::confide.login.remember') }}}</label>
                <input type="hidden" name="remember" value="0">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
            
        </div> -->
        @if (Session::get('error'))
            <div class="help-block">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
        <div class="form-group">
            <button tabindex="3" type="submit" class="btn btn-primary col-xs-12">{{{ Lang::get('confide::confide.login.submit') }}}</button>
        </div>
    </fieldset>
</form>

@stop