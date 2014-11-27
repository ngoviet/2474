<!-- start: Main Menu -->
<div class="sidebar ">

  <div class="sidebar-collapse">

    <div class="sidebar-header">

      {{ HTML::image('assets/img/avatar.jpg') }}

      <h2><a href="{{{ URL::to('user/index') }}}"> {{ Auth::user()->username }}</a></h2>
      {{--@if(Auth::user()->hasRole('admin'))--}}
        <h3><a href="{{{ URL::to('/') }}}">User Panel</a></h3>
      {{--@else--}}
        {{--<h3>{{ Auth::user()->email }}</h3>--}}
      {{--@endif--}}

      <div class="user-menu">
        <a id="sidebar-minify" href="#"><i class="fa fa-ellipsis-v"></i></a>
      </div>

    </div>

    <div class="sidebar-menu">
      <ul class="nav nav-sidebar">
        <li>
          <a href="#"><i class="fa fa-truck"></i><span>Hợp đồng</span><span class="indicator"></span></a>
          <ul>
            <li><a href="{{ url('admin/cities') }}"><i class="fa fa-users"></i><span class="text">Thành phố</span></a></li>
            <li><a href="{{ url('admin/cities/index1') }}"><i class="fa fa-users"></i><span class="text">Thành phố AngularJs</span></a></li>
            <li><a href="{{ url('admin/customers') }}"><i class="fa fa-users"></i><span class="text">Khách hàng</span></a></li>
            <li><a href="{{ url('admin/positions') }}"><i class="fa fa-users"></i><span class="text">Chức danh</span></a></li>
            <li><a href="{{ url('admin/agencies') }}"><i class="fa fa-users"></i><span class="text">Đại lý</span></a></li>
            <li><a href="{{ url('admin/staffs') }}"><i class="fa fa-users"></i><span class="text">Nhân viên</span></a></li>
            <li><a href="{{ url('admin/contacts') }}"><i class="fa fa-users"></i><span class="text">Người liên hệ</span></a></li>
            <li><a href="{{ url('admin/contracts') }}"><i class="fa fa-users"></i><span class="text">Hợp đồng</span></a></li>
            <li><a href="{{ url('admin/contractTypes') }}"><i class="fa fa-users"></i><span class="text">Loại hợp đồng</span></a></li>
            <li><a href="{{ url('admin/contractMaterials') }}"><i class="fa fa-users"></i><span class="text">Hợp đồng MBTB</span></a></li>
            <li><a href="{{ url('admin/contractServices') }}"><i class="fa fa-users"></i><span class="text">Hợp đồng CCDV</span></a></li>
            <li><a href="{{ url('admin/servicePackages') }}"><i class="fa fa-users"></i><span class="text">Gói dịch vụ</span></a></li>
          </ul>
        </li>

        <li>
          <a href="#"><i class="fa fa-info"></i><span>Thông tin</span><span class="indicator"></span></a>
          <ul>
            <li><a href="{{ url('admin/infos') }}"><i class="fa fa-info-circle"></i><span class="text">Tin tức</span></a></li>
            <li><a href="{{ url('admin/comments') }}"><i class="fa fa-comments-o"></i><span class="text">Bình luận</span></a></li>
            <li><a href="{{ url('admin/users') }}"><i class="fa fa-users"></i><span class="text">Người dùng</span></a></li>
          </ul>
        </li>



      </ul>
    </div>
  </div>
  <div class="sidebar-footer">
    <ul class="sidebar-footer-menu">
      <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
      <li><a href="{{ url('user/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>

    <div class="sidebar-brand">
        Tổ 247
    </div>
  </div>
</div>
<!-- end: Main Menu -->