<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm expand-header">

    <!-- Kiri: Hamburger toggle -->
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom" aria-label="Toggle sidebar">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
           viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </a>

    <!-- Kanan: User info + foto + icon dropdown jadi satu group -->
    <div class="d-flex align-items-center ml-auto user-profile-group"
         style="gap: 12px; cursor:pointer; white-space: nowrap;">

      <!-- Nama pengguna -->
      <span class="user-name font-weight-bold" style="white-space: nowrap;"><a href="{{ url('admin/profile') }}">{{ $user->nama_admin }}</a></span>

      <!-- Foto profil -->
      <div style="display: flex; align-items: center;">
        <img src={{ asset('assets/img/image.png')}} alt="avatar" class="rounded-circle"style="width:32px; height:32px; object-fit: cover; border: 1px solid #ccc; flex-shrink: 0; margin-right: 8px;">
      </div>


      {{-- <!-- Icon profil notifikasi -->
      <a class="dropdown-item" href="notifikasi"
         style="margin-left: 16px; padding: 0; display: flex; align-items: center;">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
          <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg> --}}

      </a>

    </div>

    </ul>
  </header>
</div>








{{--
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-item flex-row ml-auto">

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="assets/img/90x90.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                        <h5><a href="{{ url('admin/profile') }}">{{ $user->nama_admin }}</a></h5>
                                    <p>Admin Jurusan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div> --}}
