<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{__('Dashboard')}}</p>
                    </a>
                </li>

                @can('Security - access')
                    <li class="nav-item" id="li-security">
                        <a href="#" class="nav-link" id="a-security">
                            <i class="nav-icon fas fa-shield-alt text-success"></i>
                            <p>
                                {{ __('Security') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Users - access')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" id="a-users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Users') }}</p>
                                    </a>
                                </li>
                            @endcan

                            @can('Roles - access')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" id="a-roles">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Roles') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Permissions - access')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link" id="a-permissions">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Permissions') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                    

                <li class="nav-item mb-4">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>