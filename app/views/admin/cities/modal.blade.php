<div class="md-modal md-effect-4" id="cityModal" style="width: 300px;">
    <div class="modal-dialog md-content">
        <div class="modal-content">
            {{--<form role="form" method="post" action="@if (isset($city)){{ URL::to('admin/cities/' . $city->id . '/show') }}@endif" autocomplete="off">--}}
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <!-- ./ csrf token -->
                <div class="modal-header">
                    <h2><strong>{{$title}}</strong></h2>
                </div>
                <div class="modal-body">
                    <div class="form-group {{{ $errors->has('id') ? 'error' : '' }}}">
                        <label class="text-right control-label" for="id">{{ trans('admin/cities/table.city_id') }}</label>
                        <div>
                            <input class="form-control" readonly name="id" id="id" type="text" value="{{{ Input::old('id', isset($city) ? $city->id : null) }}}"/>
                            {{{ $errors->first('id') }}}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                        <label class="text-right control-label" for="name">{{ trans('admin/cities/table.city_name') }}</label>
                        <div>
                            <input class="form-control" name="name" id="name" type="text" value="{{{ Input::old('name', isset($city) ? $city->name : null) }}}"/>
                            {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('code') ? 'error' : '' }}}">
                        <label class="text-right control-label" for="code">{{ trans('admin/cities/table.city_code') }}</label>
                        <div>
                            <input class="form-control" name="code" id="code" type="text"  value="{{{ Input::old('code', isset($city) ? $city->code : null) }}}"/>
                            {{{ $errors->first('code', '<span class="help-block">:message</span>') }}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-info btn btn-sm md-close"><i class="fa fa-ban"></i> Hủy bỏ</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i> Khôi phục</button>
                    <button id="update" class="btn btn-primary btn-sm"><i class="fa fa-check-circle-o"></i> Cập nhật</button>
                </div>
            {{--</form>--}}
        </div>
    </div>
</div>



