<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="/dashboard" class="site_title"><i class="fa fa-dashboard"></i> <span>Manager hotel!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="<?php echo asset('/plugins/images/img.jpg') ?>" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Xin chào,</span>
            <h2>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>Administration</h3>
            <ul class="nav side-menu">
                <li class="<?php echo request()->is('dashboard') ? 'active' : ''  ?>">
                    <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    </ul>
                </li>

                <li class="<?php echo request()->is('rooms') ? 'active' : ''  ?>">
                    <a><i class="fa fa-bed"></i> Quản lý Phòng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('rooms.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('rooms.add') }}">Thêm mới</a></li>
                    </ul>
                </li>

                <li class="<?php echo request()->is('customers') ? 'active' : ''  ?>">
                    <a><i class="fa fa-user-md"></i> Quản lý khách hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('customers.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('customers.add') }}">Thêm mới</a></li>
                    </ul>
                </li>

                <li class="<?php echo request()->is('equipment') ? 'active' : ''  ?>">
                    <a><i class="fa fa-laptop"></i> Quản lý thiết bị <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('equipment.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('equipment.add') }}">Thêm mới</a></li>
                    </ul>
                </li>

                <li class="<?php echo request()->is('bookings') ? 'active' : ''  ?>">
                    <a><i class="fa fa-calendar"></i> Quản lý đặt phòng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('bookings.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('bookings.add') }}">Thêm mới</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
