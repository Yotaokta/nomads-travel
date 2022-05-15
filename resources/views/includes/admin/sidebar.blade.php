<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <div class="sidebar-brand-text mx-3">Nomads Travel</div>
    </a>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('travel-package.index') }}">
            <i class="fas fa-plane-departure"></i>
            <span>Paket Travel</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('galleries.index') }}">
            <i class="fas fa-images"></i>
            <span>Galeri</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-money-bill-wave-alt"></i>
            <span>Transaksi</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>