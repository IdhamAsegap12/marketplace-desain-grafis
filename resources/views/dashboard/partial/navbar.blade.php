    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none py-3">
        <img src="{{ asset('img/logo-dark.png') }}" class="me-3" height="37" alt="">
    </a>

    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    

    <div class="navbar-nav ms-auto col-12 col-lg-auto">
        <div class="d-flex align-items-center m-auto">
            @can('duo')
            <a href="/notifikasi" class="btn btn-dark p-0"><i class="bi bi-bell"></i></a>
            <small><div class="badge bg-white text-dark rounded-circle">{{ auth()->user()->pesans->count() }}</div></small>
            @endcan
            <form action="/logout" method="post">@csrf
                <button type="submit" class="px-3 btn bg-none text-white"><i class="bi bi-box-arrow-right"></i> Keluar</button>
            </form>
        </div>
    </div>