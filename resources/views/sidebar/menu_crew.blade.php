<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/crew/dashboard">
        <img src="/assets/images/logo.png" alt="" class="nav-item w-100" />
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ '/crew/dashboard' }}">
          <i class="fe fe-calendar fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->id_armada)
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ '/crew/riwayat-perawatan' }}">
          <i class="fe fe-calendar fe-16"></i>
          <span class="ml-3 item-text">
            Riwayat Perawatan
          </span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ '/crew/riwayat-perbaikan' }}">
          <i class="fe fe-calendar fe-16"></i>
          <span class="ml-3 item-text">
            Riwayat Perbaikan
          </span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ '/crew/buat-rampcheck' }}">
          <i class="fe fe-calendar fe-16"></i>
          <span class="ml-3 item-text">
            Buat Rampcheck
          </span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ '/crew/riwayat-rampcheck' }}">
          <i class="fe fe-calendar fe-16"></i>
          <span class="ml-3 item-text">
            Riwayat Rampcheck
          </span>
        </a>
      </li>
      @endif
    </ul>
  </nav>
</aside>