        <div class="sidebar-wrapper sidebar-theme">

            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="{{ url('mahasiswa/beranda') }}">
                            <img src="{{ asset('assets/img/favicon.ico') }}" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="{{ url('mahasiswa/beranda') }}" class="nav-link"> COMPQUEST </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ url('mahasiswa/beranda') }}" aria-expanded="{{ Request::is('mahasiswa/beranda*') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span> Beranda </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                    <a href="{{ url ('mahasiswa/prestasi') }}" aria-expanded="{{ Request::is('mahasiswa/prestasi*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"> <circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                        <span> Prestasi </span>
                        </div>
                    </a>
                    </li>


                    <li class="menu">
                        <a href="{{ url ('mahasiswa/lomba') }}" aria-expanded="{{ Request::is('mahasiswa/lomba*') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <span> Lomba </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="{{ url ('mahasiswa/bimbingan-form') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a4 4 0 0 0-4-4H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a4 4 0 0 1 4-4h6z"></path></svg>
                                <span> Bimbingan </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span> Keluar </span>
                            </div>
                        </a>
                    </li>


                </ul>
            </nav>

        </div>
