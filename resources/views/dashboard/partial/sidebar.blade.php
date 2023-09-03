<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      @can('admin')
      <ul class="nav flex-column">
        <li class="nav-item mt-5">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-speedometer2"></i>
            Dasbor
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" aria-current="page" href="/profil">
            <i class="bi bi-person"></i>
            Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('manajemen-user*') ? 'active' : '' }}" aria-current="page" href="/manajemen-user">
            <i class="bi bi-people"></i>
            Manajemen User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('manajemen-produk*') ? 'active' : '' }}" aria-current="page" href="/manajemen-produk">
            <i class="bi bi-card-list"></i>
            Manajemen Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('manajemen-pendapatan') ? 'active' : '' }}" aria-current="page" href="/manajemen-pendapatan">
            <i class="bi bi-cash-coin"></i>
            Manajemen Pendapatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('upload') ? 'active' : '' }}" aria-current="page" href="/upload">
            <i class="bi bi-file-earmark-plus"></i>
            Upload Desain
          </a>
        </li>
      </ul>
      @endcan

      @can('desainer')
      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Dasbor Desainer</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6> --}}
      <ul class="nav flex-column mt-5">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" aria-current="page" href="/profil">
            <i class="bi bi-person"></i>
            Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('manajemen-produk*') ? 'active' : '' }}" aria-current="page" href="/manajemen-produk">
            <i class="bi bi-card-list"></i>
            Manajemen Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('manajemen-pendapatan*') ? 'active' : '' }}" aria-current="page" href="/manajemen-pendapatan">
            <i class="bi bi-cash-coin"></i>
            Manajemen Pendapatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('upload') ? 'active' : '' }}" aria-current="page" href="/upload">
            <i class="bi bi-upload"></i>
            Upload Desain
          </a>
        </li>
      </ul>
      @endcan

      @can('customer')
      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Customer</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6> --}}
      <ul class="nav flex-column mt-5">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('riwayat-pembelian') ? 'active' : '' }}" aria-current="page" href="/riwayat-pembelian">
            <i class="bi bi-clock-history"></i>
            Riwayat Pembelian
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" aria-current="page" href="/profil">
            <i class="bi bi-person"></i>
            Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('unduh*') ? 'active' : '' }}" aria-current="page" href="/unduh">
            <i class="bi bi-file-earmark-arrow-down"></i>
            Unduh Produk
          </a>
        </li>
      </ul>
      @endcan

    </div>
  </nav>

 

