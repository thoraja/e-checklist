<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link bg-white">
        <img src="{{ asset('img/checklist-icon.png') }}" alt="{{ config('app.name') }} Logo" class="brand-image">
        <span class="brand-text font-weight-bold text-uppercase">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel py-2 d-flex">
            <div class="image align-self-center">
                <img src="{{ asset('img/pertamina.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info text-light">
                <p href="#" class="d-block font-weight-bold my-0 py-0">Pertamina</p>
                <p href="#" class="my-0 py-0">Fuel Terminal Boyolali</p>
            </div>
            <div class="info">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('checklist.index') }}" class="nav-link {{ request()->routeIs('checklist.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Checklist<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('checklist.harian.index') }}" class="nav-link {{ request()->routeIs('checklist.harian.*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Harian</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('checklist.mingguan.index') }}" class="nav-link {{ request()->routeIs('checklist.mingguan.*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mingguan</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bulanan</p>
                          </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- /.sidebar -->
