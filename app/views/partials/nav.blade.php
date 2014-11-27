<div class="navbar" role="navigation">
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-actions navbar-left">
        <li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-bars"></i></a></li>
        <li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-bars"></i></a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="Search...">
      </form>
      <ul class="nav navbar-nav navbar-right">
        {{--<li><a data-toggle="tooltip" data-placement="bottom" title="Tổng hợp" href={{ URL::to('abc/test') }}><i class="fa fa-bell"></i></a></li>--}}
        <li><a data-toggle="tooltip" data-placement="bottom" title="Tổng hợp" href={{ URL::to('admin/generates') }}><i class="fa fa-book"></i></a></li>
        <li><a data-toggle="tooltip" data-placement="bottom" title="Trang chủ" href="/"><i class="fa fa-home"></i></a></li>

        <li class="dropdown visible-md visible-lg">
              {{--<form action="locale" method="post" >--}}
              <a href="#" class="dropdown-toggle" data-toggle='dropdown'>{{ HTML::image('assets/ico/flags/Viet Nam.png', 'Việt Nam', array('style' => 'height:18px; margin-top:-2px;padding:0 7px')) }}</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">{{ HTML::image('assets/ico/flags/Viet Nam.png', 'Việt Nam', array('style' => 'height:18px; margin-top:-2px;')) }}</a></li>
                    <li><a href="#">{{ HTML::image('assets/ico/flags/USA.png', 'USA', array('style' => 'height:18px; margin-top:-2px;')) }}</a></li>

                  </ul>
              {{--</form>--}}
            </li>
        
        <li><a href="#"><i class="fa fa-cog"></i></a></li>
       
        <li><a href="{{ url('user/logout') }}"><i class="fa fa-power-off"></i></a></li>
      </ul>
    </div>
</div>