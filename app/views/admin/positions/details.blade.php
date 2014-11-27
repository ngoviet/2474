<div class="container-fluid">
    <div class="row">
        <div class="form-horizontal col-md-12">
            <div class="form-group {{{ $erors }}}">

            </div>

            <div class="form-horizontal col-md-3 col-xs-3">
                <div class="form-group {{{ $errors->has('id') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="id">#</label>
                    <div class="col-md-8">
                        <input class="form-control" readonly type="text" name="id" id="id"  value="{{{ Input::old('id', isset($customer) ? $customer->id : null) }}}"/>
                        {{{ $errors->first('id', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('account') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="account">Tài khoản</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="account" id="account" value="{{{ Input::old('account', isset($customer) ? $customer->account : null) }}}"/>
                        {{{ $errors->first('account', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('phone') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="phone">Số ĐT</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="phone" id="phone" value="{{{ Input::old('phone', isset($customer) ? $customer->phone : null) }}}"/>
                        {{{ $errors->first('phone', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('fax') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="fax">Số fax</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="fax" id="fax" value="{{{ Input::old('fax', isset($customer) ? $customer->fax : null) }}}"/>
                        {{{ $errors->first('fax', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="email">Email</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($customer) ? $customer->email : null) }}}"/>
                        {{{ $errors->first('email', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('tax') ? 'error' : '' }}}">
                    <label class="col-md-4 text-right control-label" for="tax">MST</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="tax" id="tax" value="{{{ Input::old('tax', isset($customer) ? $customer->tax : null) }}}"/>
                        {{{ $errors->first('tax', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
            </div>
            <div class="form-horizontal col-md-9 col-xs-9">
                <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                    <label class="col-md-2 text-right control-label" for="name">Tên công ty</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($customer) ? $customer->name : null) }}}"/>
                        {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
                    <label class="col-md-2 text-right control-label" for="address">Địa chỉ</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($customer) ? $customer->address : null) }}}"/>
                        {{{ $errors->first('address', '<span class="help-block">:message</span>') }}}
                    </div>
                </div>
                <div class="row">
                    <div class="form-horizontal col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 text-right control-label" for="city_id">Thành phố</label>
                            <div class="col-md-8">
                                <select class="form-control" name="city_id" id="city_id" disabled>
                                    @if(isset($customer))
                                        @if(isset($cities))
                                            @foreach($cities as $city)
                                                <option value="{{{ Input::old('city_id', isset($city) ? $city->id : null) }}}" {{ $customer->city_id == $city->id ? ' selected="selected"' : '' }}>{{ $city->name }}</option>
                                            @endforeach : null
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 text-right control-label" for="agency_id">Đại lý</label>
                            <div class="col-md-8">
                                <select class="form-control" name="agency_id" id="agency_id" disabled>
                                    @if(isset($customer))
                                        @if(isset($cities))
                                            @foreach($agencies as $agency)
                                                <option value="{{ Input::old('agency_id', isset($agency) ? $agency->id : null) }}" {{ $customer->agency_id == $agency->id ? 'selected="selected"' : '' }}>{{ $agency->name }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="form-group {{{ $errors->has('bank_number') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="bank_number">Số TK ngân hàng</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="bank_number" id="bank_number" value="{{{ Input::old('bank_number', isset($customer) ? $customer->bank_number : null) }}}"/>
                                {{{ $errors->first('bank_number', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="form-group {{{ $errors->has('bank_name') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="bank_name">Tên ngân hàng</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{{ Input::old('bank_name', isset($customer) ? $customer->bank_name : null) }}}"/>
                                {{{ $errors->first('bank_name', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="form-group {{{ $errors->has('create_at') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="create_at">Ngày tạo hợp đồng</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="create_at" id="create_at" value="{{{ Input::old('create_at', isset($customer) ? $customer->create_at : null) }}}"/>
                                {{{ $errors->first('create_at', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal col-md-6">
                        <div class="form-group {{{ $errors->has('license_number') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="license_number">Số GP</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="license_number" id="license_number" value="{{{ Input::old('license_number', isset($customer) ? $customer->license_number : null) }}}"/>
                                {{{ $errors->first('license_number', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="form-group {{{ $errors->has('license_date_create') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="license_date_create">Ngày cấp</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="license_date_create" id="license_date_create" value="{{{ Input::old('license_date_create', isset($customer) ? $customer->license_date_create : null) }}}"/>
                                {{{ $errors->first('license_date_create', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="form-group {{{ $errors->has('license_date_end') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="license_date_end">Ngày hết hạn</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="license_date_end" id="license_date_end" value="{{{ Input::old('license_date_end', isset($customer) ? $customer->license_date_end : null) }}}"/>
                                {{{ $errors->first('license_date_end', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="form-group {{{ $errors->has('license_address_create') ? 'error' : '' }}}">
                            <label class="col-md-4 text-right control-label" for="license_address_create">Nơi cấp</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="license_address_create" id="license_address_create" value="{{{ Input::old('license_address_create', isset($customer) ? $customer->license_address_create : null) }}}"/>
                                {{{ $errors->first('license_address_create', '<span class="help-block">:message</span>') }}}
                            </div>
                        </div>
                        <div class="text-center">
                            <label class="control-label"><input type="checkbox" name="is_active" id="is_active" {{ Input::old('is_active', isset($customer) ? ($customer->is_active == 1 ? 'checked' : null) : null) }}/> Trạng thái hoạt động</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>