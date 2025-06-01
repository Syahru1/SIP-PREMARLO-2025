<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm expand-header d-flex align-items-center justify-content-between px-3">

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
      <span class="user-name font-weight-bold" style="white-space: nowrap;">Alan Green</span>

      <!-- Foto profil -->
      <img src="assets/img/90x90.jpg" alt="avatar" class="rounded-circle" 
           style="width:32px; height:32px; object-fit: cover; border: 1px solid #ccc; flex-shrink: 0;">

      <!-- Icon profil notifikasi -->
      <a class="dropdown-item" href="notifikasi" 
         style="margin-left: 16px; padding: 0; display: flex; align-items: center;">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
             stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
          <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg> 

      </a>

    </div>

  </header>
</div>
