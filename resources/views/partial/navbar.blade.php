<header class="p-3 text-white fixed-top site-header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="{{ asset('img/logo-dark.png') }}" class="me-3" height="37" alt="">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/desainer" class="nav-link px-2 text-white text-success"><i class="bi bi-vector-pen"></i> Desainer</a></li>
          <li><a href="/produk" class="nav-link px-2 text-white"><i class="bi bi-image-alt"></i> Produk</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-tags-fill"></i>  Kategori
            </a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
              <li><a class="dropdown-item {{ Request::is('category/logo') ? 'active' : '' }}" href="/category/logo">Logo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item {{ Request::is('category/animasi') ? 'active' : '' }}" href="/category/animasi">Animasi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item {{ Request::is('category/asset-game-2d') ? 'active' : '' }}" href="/category/asset-game-2d">Asset Game 2D</a></li>
            </ul>
          </li>
          <li><a href="/terms-condition" class="nav-link px-2 text-white"><i class="bi bi-file-check"></i> Syarat & Ketentuan</a></li>
          {{-- <li><a href="/tentang" class="nav-link px-2 text-white"><i class="bi bi-info-circle-fill"></i> Tentang</a></li> --}}
        </ul>

        <ul class="nav ms-auto col-12 col-lg-auto  mb-2">
          <form action="/produk" method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" name="cari" placeholder="Search..." aria-label="Search">
          </form>
  
          @auth
          <div class="d-flex align-items-center m-auto">
            {{-- keranjang --}}
            <li class="nav-item"><a href="/keranjang" class="nav-link text-white"><i class="bi bi-cart"></i> 
            <div class="badge bg-secondary rounded-circle">{{ auth()->user()->keranjangs()->count() }}</div></a></li>
            {{-- Notif --}}
            <a href="/notifikasi" class="btn btn-dark p-0"><i class="bi bi-bell"></i></a> 
            <div class="badge bg-warning text-dark rounded-circle">{{ auth()->user()->pesans->count() }}</div>
            {{-- Dropdown --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ auth()->user()->nama }}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
                @can('admin')
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2"></i> Dasbor</a></li>
                <li><hr class="dropdown-divider"></li>
                @endcan
                @can('customer')
                <li><a class="dropdown-item" href="/kontributor"><i class="bi bi-vector-pen"></i> Kontributor</a></li>
                <li><hr class="dropdown-divider"></li>
                @endcan
                <li><a class="dropdown-item" href="/profil"><i class="bi bi-person"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                @can('duo')
                <li><a class="dropdown-item" href="/manajemen-pendapatan"><i class="bi bi-cash-coin"></i> Pendapatan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/upload"><i class="bi bi-upload"></i> Upload Desain</a></li>
                <li><hr class="dropdown-divider"></li>
                @endcan
                <li><a class="dropdown-item" href="/riwayat-pembelian"><i class="bi bi-clock-history"></i> Riwayat Pembelian</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/unduh"><i class="bi bi-file-earmark-arrow-down"></i> Unduh Produk</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">@csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </div>
          @else
          <div class="text-end m-auto">
            <a href="/masuk" class="btn btn-outline-light me-2">Masuk</a>
            <a href="/daftar" class="btn btn-warning">Daftar</a>
          </div>
          @endauth
        </ul>
      </div>
    </div>
  </header>

  

  