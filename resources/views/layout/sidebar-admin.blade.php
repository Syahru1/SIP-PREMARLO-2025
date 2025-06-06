<style>
    .logout-item {
        background-color: #ee2a2a;
    }

    .logout-item a,
    .logout-item a span {
        color: white !important;
    }

    .logout-item svg {
        stroke: white !important;
    }
</style>

 <div class="sidebar-wrapper sidebar-theme">

    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

        <nav id="sidebar">

            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/90x90.jpg')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> COMPQUEST </a>
                </li>
            </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ url('admin/beranda') }}" aria-expanded="{{ Request::is('admin/beranda*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-home" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        <span>Beranda</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#kelolaAkun" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/kelola-*') ? 'true' : 'false' }}" data-toggle="collapse">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-users" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-3-3.87"/><path d="M7 21v-2a4 4 0 0 1 3-3.87"/><circle cx="12" cy="7" r="4"/></svg>
                        <span>Kelola Akun</span>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="kelolaAkun" data-parent="#accordionExample">
                    <li><a href="{{ url('admin/kelola-admin') }}">Akun Admin</a></li>
                    <li><a href="{{ url('admin/kelola-dosen') }}">Akun Dosen</a></li>
                    <li><a href="{{ url('admin/kelola-mahasiswa') }}">Akun Mahasiswa</a></li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ url('admin/kelola-data-lomba') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/kelola-data-lomba*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-database" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.7 4 3 9 3s9-1.3 9-3V5"/><path d="M3 12c0 1.7 4 3 9 3s9-1.3 9-3"/></svg>
                        <span>Kelola Data Lomba</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/verifikasi-lomba') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/verifikasi-lomba*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-check-circle" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2l4-4"/><circle cx="12" cy="12" r="10"/></svg>
                        <span>Verifikasi Lomba</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/verifikasi-prestasi') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/verifikasi-prestasi*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-award" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                        <span>Verifikasi Prestasi</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/kelola-periode') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/kelola-periode*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-calendar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
                        <span>Kelola Periode</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/kelola-prodi') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/kelola-prodi*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-layers" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                        <span>Kelola Prodi</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/rekomendasi-lomba') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/rekomendasi-lomba*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-thumbs-up" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-6 0v4H5a2 2 0 0 0 0 4h3v7h6l3-6v-5z"/><path d="M23 10h-4v12h4z"/></svg>
                        <span>Rekomendasi Lomba</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ url('admin/laporan-analisis-prestasi') }}" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/laporan-analisis-prestasi*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-bar-chart-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                        <span>Laporan & Analisis Prestasi</span>
                    </div>
                </a>
            </li>
            <li class="menu logout-item">
                <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-toggle" aria-expanded="{{ Request::is('admin/beranda*') ? 'true' : 'false' }}">
                    <div>
                        <svg class="feather feather-log-out" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        <span>Logout</span>
                    </div>
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
