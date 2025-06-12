<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm expand-header"  style="height:56px; padding-top:8px; padding-bottom:8px;">

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

    <!-- Kanan -->
    <ul class="navbar-item flex-row ml-auto align-items-center">

      <!-- Info User -->
      <li class="nav-item ml-2 d-flex align-items-center">
        <span class="ml-2 d-none d-md-inline-block font-weight-bold">{{ $user->nama}}</span>
        <img src="{{url('uploads/profil/'. $user->foto)}}" class="rounded-circle ml-2 border border-dark"
             alt="avatar" style="width:35px; height:35px; object-fit:cover;">
      </li>

      <!-- Pengaturan Profil Saya -->
      <li class="nav-item mr-2">
        <a class="nav-link d-flex align-items-center" href="{{ url('mahasiswa/profil') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-settings mr-1">
            <circle cx="12" cy="12" r="3"></circle>
            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65
                     1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65
                     1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65
                     1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65
                     1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1
                     2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2
                     0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2
                     2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0
                     1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
          </svg>
          <span class="d-none d-md-inline font-weight-bold"></span>
        </a>
      </li>


    </ul>
  </header>
</div>
