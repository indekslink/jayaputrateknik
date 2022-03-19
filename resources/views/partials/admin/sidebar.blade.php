<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Jaya Putra Teknik</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">JPT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{request()->is('admin')  ? 'active' : ''}}"><a class="nav-link " href="{{route('admin')}}"><i class="fas fa-home"></i> <span>Home</span></a></li>

            <li class="menu-header">Manage</li>

            <li class="{{request()->is('admin/profile') || request()->is('admin/profile/*') ? 'active' : ''}}"><a class="nav-link " href="{{route('admin.profile')}}"><i class="fas fa-landmark"></i> <span>Profile</span></a></li>

            <li class="{{request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : ''}}"><a class="nav-link " href="{{route('products.index')}}"><i class="fas fa-clipboard-list"></i> <span>Product</span></a></li>

            <li class="{{request()->is('admin/contact') || request()->is('admin/contact/*') ? 'active' : ''}}"><a class="nav-link " href="{{route('admin.contact')}}"><i class="fas fa-address-card"></i> <span>Contact</span></a></li>

            <li class="{{request()->is('admin/sosmed') || request()->is('admin/sosmed/*') ? 'active' : ''}}"><a class="nav-link " href="{{route('sosmed.index')}}"><i class="fas fa-th"></i> <span>Social Media</span></a></li>
        </ul>

        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> -->
    </aside>
</div>