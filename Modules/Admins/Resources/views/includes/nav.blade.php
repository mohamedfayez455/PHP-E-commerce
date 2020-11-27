<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
{{--        <span class="logo-mini"><b>A</b>LT</span>--}}
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> Controller</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <!--language -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Arabic
                                        </h3>
                                    </a>
                                </li>
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            English
                                        </h3>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>



                <!-- User Account -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth('admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                            <p>
                                {{auth('admin')->user()->name}} - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{url('/admin/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>




            </ul>
        </div>
    </nav>
</header>




<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{auth('admin')->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->



        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('home.admin')}}"><i class="fa fa-home"></i> Home Page</a></li>
                </ul>
            </li>

{{--            <li>--}}
{{--                <a href="{{route('admins.index')}}">--}}
{{--                    <i class="fa fa-user"></i> <span>Admins</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--            </span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Admins</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('admins.index')}}"><i class="fa fa-user"></i> Mange Admins </a></li>
                    <li class="active"><a href="{{route('admins.create')}}"><i class="fa fa-user"></i> Create Admin </a></li>
                </ul>
            </li>



            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Departments</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('departments.index')}}"><i class="fa fa-folder"></i> Mange Departments </a></li>
                    <li class="active"><a href="{{route('departments.create')}}"><i class="fa fa-folder"></i> Create Department </a></li>
                </ul>
            </li>



            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('products.index')}}"><i class="fa fa-product-hunt"></i> Mange Products </a></li>
                    <li class="active"><a href="{{route('products.create')}}"><i class="fa fa-product-hunt"></i> Create Product </a></li>
                </ul>
            </li>


                        <li>
                            <a href="{{route('orders.index')}}">
                                <i class="fa fa-first-order"></i> <span>Orders</span>
                                <span class="pull-right-container">
                        </span>
                            </a>
                        </li>


        </ul>





    </section>
    <!-- /.sidebar -->
</aside>
