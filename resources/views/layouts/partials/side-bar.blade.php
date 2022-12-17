<aside class="main-sidebar custom-color elevation-4">
<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="{{asset('/img/irosin.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light text-light text-sm">PDIS-Irosin</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block text-white">{{auth()->user()->first_name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.home')}}" class="text-white nav-link {{!request()->routeIs('admin.home') ? : 'active'}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{route('barangay')}}" class="text-white nav-link {{!request()->routeIs('barangay') ? : 'active'}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Barangay
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="text-white nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Disability Type
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="text-white nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Blood Type
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="text-white nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Classification
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="text-white nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    PWD List
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="text-white nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    SMS Notification
                    </p>
                </a>
            </li>
            <br>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="text-white nav-link" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                    Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>