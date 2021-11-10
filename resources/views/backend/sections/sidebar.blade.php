<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('admin/dashboard') }}">
            <span class="header-logo">
                <img src="{{ asset('backend/assets/img/logo/logo.png') }} " width="80%" alt="logo">
            </span>
        </a>
    </div>

    <ul class="sidebar-menu mt-3">

        <li class="dropdown">
            <a href="{{ url('admin/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>სამართავი პანელი</span></a>
        </li>
        @can('product-list')
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-cart"></i>
                <span>პროდუქცია</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/products') }}">პროდუქცია</a></li>
                <li><a class="nav-link" href="{{ url('admin/product/create') }}"> დამატება</a></li>
            </ul>
        </li>
        @endcan

        @can('category-list')
        <li class="dropdown">
            <a href="{{ url('admin/categories') }}" class="nav-link"><i data-feather="list"></i><span>კატეგორიები</span></a>
        </li>
        @endcan
        @can('table-list')
        <li class="dropdown">
            <a href="{{ url('admin/tables') }}" class="nav-link"><i data-feather="minimize"></i><span>მაგიდები</span></a>
        </li>
        @endcan
        @can('place-list')
        <li class="dropdown">
            <a href="{{ url('admin/places') }}" class="nav-link"><i data-feather="layout"></i><span>ადგილები</span></a>
        </li>
        @endcan

        @can('setting-list')
        <li class="menu-header">Admin</li>
        @endcan
        @can('setting-list')
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="repeat"></i>
                <span>ინპორტი / ექსპორტი</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/products/inport') }}"> ინპორტი</a></li>
                <li><a class="nav-link" href="{{ url('admin/products/export') }}"> ექსპორტი</a></li>
            </ul>
        </li>
        @endcan

        @can('user-list')
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i>
                <span>მომხმარებლები</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/users') }}">მომხმარებლები</a></li>
                @can('role-list')
                <li><a class="nav-link" href="{{ url('admin/roles') }}"> პრივილეგიები</a></li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('setting-list')
        <li class="dropdown">
            <a href="{{ url('admin/setting') }}" class="nav-link"><i data-feather="settings"></i><span>პარამეტრები</span></a>
        </li>
        @endcan




    </ul>
</aside>
