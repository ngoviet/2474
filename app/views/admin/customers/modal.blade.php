<div class="modal fade bs-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">

  <form role="form"  method="post" action="@if (isset($customer)){{ URL::to('admin/customers/' . $customer->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="modal-content">
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
    </div>   </form>
  </div>
</div>


