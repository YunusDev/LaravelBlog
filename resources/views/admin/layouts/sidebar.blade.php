<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/AdminProfilePic/{{auth('admin')->user()->photo ? auth('admin')->user()->photo->path : "seun1.jpg"}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admins.index')}}" class="nav-link active">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Admins
                            {{--<i class="right fa fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="pages/widgets.html" class="nav-link"><i class="nav-icon fa fa-book"></i><p class="pl-1"> Blog</p></a>--}}
                {{--</li>--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Blog
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blog.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tag.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Tag</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link"><i class="nav-icon fa fa-user-o"></i><p class="pl-1"> Users</p></a>
                </li>

                <li class="nav-header">AUTHORIZING</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>
                            Accessibility
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permission.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>