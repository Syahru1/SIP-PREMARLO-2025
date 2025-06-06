<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm expand-header">

    <!-- Sidebar toggle -->
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
           viewBox="0 0 24 24" fill="none" stroke="currentColor"
           stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-menu">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </a>

    <!-- Kanan: Notifikasi + Profil -->
    <ul class="navbar-item flex-row ml-auto">

      <!-- Notifikasi -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('mahasiswa/notifikasi') }}" title="Notifikasi">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-bell">
            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </a>
      </li> -->

      <!-- Profil -->
      <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user"
           id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-user-check">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="8.5" cy="7" r="4"></circle>
            <polyline points="17 11 19 13 23 9"></polyline>
          </svg>
        </a>
        <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
          <div class="user-profile-section px-3 pt-3 pb-2">
            <div class="media">
              <img src="{{ asset('assets/img/90x90.jpg') }}" class="img-fluid mr-2 rounded-circle"
                   style="width:45px; height:45px;" alt="avatar">
              <div class="media-body">
                <h6 class="mb-0 font-weight-bold">{{ $user->nama ?? 'Mahasiswa' }}</h6>
                <p class="mb-0 text-muted" style="font-size: 13px;">D-IV Informatika</p>
              </div>
            </div>
          </div>
          <div class="dropdown-item">
            <a href="{{ url('mahasiswa/profil') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                   viewBox="0 0 24 24" fill="none" stroke="currentColor"
                   stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <span>Profil Saya</span>
            </a>
          </div>
        </div>
      </li>

    </ul>
  </header>
</div>
