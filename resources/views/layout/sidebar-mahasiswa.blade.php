<style>
    .logout-item {
        margin-top: auto;
        padding: 20px 24px;
        background-color: #fee2e2;
        border-top: 1px solid #fee2e2;
    }

    .logout-item a:hover span {
        color: red;
    }

    #sidebar {
        width: 250px;
        height: 100vh;
        background: #ffffff;
        color: white;
        position: fixed;
        left: 0;
        top: 0;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    #sidebar.collapsed {
        width: 0;
    }

    #sidebar .menu a span {
        font-size: 16px;
        color: #333333;
        font-weight: 500;
    }

    #sidebar .menu svg {
        stroke: #333333;
    }

    #sidebar .menu a:hover span {
        color: #1d4ed8;
    }

    .logout-item a:hover span {
        color: red;
    }
</style>
        <div class="sidebar-wrapper sidebar-theme">

            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

            <nav id="sidebar" class="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> COMPQUEST </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="{{ route('mahasiswa.beranda') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span> Beranda </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="{{ route('mahasiswa.profil') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-3-3.87"></path><path d="M4 21v-2a4 4 0 0 1 3-3.87"></path><circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span> Profil </span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                    <a href="{{ route('mahasiswa.prestasi') }}" aria-expanded="false" class="dropdown-toggle">
                        <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"> <circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                        <span> Prestasi </span>
                        </div>
                    </a>
                    </li>


                    <li class="menu">
                        <a href="{{ route('mahasiswa.lomba') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <span> Lomba </span>
                            </div>
                        </a>
                    </li>

                    <li class="logout-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-log-out" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector('.sidebarCollapse');
    const sidebar = document.querySelector('#sidebar');

    if (toggleButton && sidebar) {
        toggleButton.addEventListener('click', function (e) {
        e.stopPropagation();
        sidebar.classList.toggle('collapsed');
        const expanded = !sidebar.classList.contains('collapsed');
        toggleButton.setAttribute('aria-expanded', expanded);
        });

        document.addEventListener('click', function (e) {
        if (!sidebar.contains(e.target) && !toggleButton.contains(e.target)) {
            sidebar.classList.add('collapsed');
            toggleButton.setAttribute('aria-expanded', false);
        }
        });
    }
    });
</script>
