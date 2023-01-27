<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/positions">Data Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/employees">Data Pegawai</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false"
                aria-controls="transaksi">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/loans">Pinjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/salaries">Penggajian</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false"
                aria-controls="laporan">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="laporan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/filter">Laporan Gaji</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/filter-slip">Slip Gaji</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/users">
                <i class="icon-file menu-icon"></i>
                <span class="menu-title">Data User</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->role == 'pegawai')
        <li class="nav-item">
            <a class="nav-link" href="/employee-salaries">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data Gaji</span>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="/profile">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil</span>
            </a>
        </li>
    </ul>
</nav>
