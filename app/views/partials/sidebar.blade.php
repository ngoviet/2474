<!-- start: Main Menu -->
<div class="sidebar ">
          
  <div class="sidebar-collapse">
    
    <div class="sidebar-header">
      
      {{ HTML::image('assets/img/avatar.jpg') }}
      
      <h2><a href="{{{ URL::to('user/index') }}}"> {{ Auth::user()->username }}</a></h2>
      @if(Auth::user()->hasRole('admin'))
        <h3><a href="{{{ URL::to('admin') }}}">Admin Panel</a></h3>
      @else
        <h3>{{ Auth::user()->email }}</h3>
      @endif

      <div class="user-menu">
        <a id="sidebar-minify" href="#"><i class="fa fa-ellipsis-v"></i></a>
      </div>
      
    </div>
    
    <div class="sidebar-menu">  
      <ul class="nav nav-sidebar">
        <li><a href="{{ url('/') }}"><i class="fa fa-info-circle"></i><span class="text">Tin tức</span></a></li>
        <li><a href="{{ url('cities') }}"><i class="fa fa-info-circle"></i><span class="text">Thành phố</span></a></li>
        <li><a href="{{ url('phaodau') }}"><i class="fa fa-truck"></i><span class="text">Phao dầu</span></a></li>

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