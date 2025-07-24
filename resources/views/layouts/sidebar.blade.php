<!-- Sidebar -->
<div class="sidebar">
    <img class="logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
    <div class="admin-title">Dashboard Admin</div>

    <div class="nav-menu">
        <a href="{{ route('dashboard') }}" class="nav-item">
            <div class="icon">
                <i class="fa-solid fa-house"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </div>

    <div class="menu-category">Menu Admin</div>

    <div class="menu-links">
         <a href="{{ route('kategori.index') }}" class="nav-item">
            <div class="icon">
                <i class="fa-solid fa-list"></i>
            </div>
            <span>Daftar Kategori</span>
        </a>
        <a href="{{ route('menu.index') }}" class="nav-item">
            <div class="icon">
                <i class="fas fa-utensils"></i>
            </div>
            <span>Daftar Menu</span>
        </a>
        <a href="{{ route('reservasi.index') }}" class="nav-item">
            <div class="icon">
                <i class="fa-solid fa-file-lines"></i>
            </div>
            <span>Data Reservasi</span>
        </a>

    </div>

    <!-- Logout menu -->
    <div style="margin-top: auto;">
        <a href="{{ route('logout') }}" class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="icon">
                <i class="fas fa-sign-out-alt"></i>
            </div>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </div>
</div>
