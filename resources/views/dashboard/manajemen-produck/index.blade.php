@extends('dashboard.layout.main')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Manajemen Produk</h1>
  </div>
  @can('admin')
    <div class="container mt-5">
      <div class="row">
          <div class="col-md-12 shadow px-4 overflow-auto">
            <div class="col-md-3">
              <h5 class="my-4 bg-dark text-center px-3 py-2 rounded text-white"><i class="bi bi-card-image"></i> Semua Data Produk</h5>
          </div>
            @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{ Session::get('pesan') }}
              <button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Status Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($producks as $produck)
                  <tr>
                    <td>{{ ++$no_p }}</td>
                    <td>{{ $produck->nama }}</td>
                    <td>{{ $produck->category->nama }}</td>
                    <td>{{ $produck->status }}</td>
                    <td>Rp.{{ number_format($produck->harga) }}</td>
                    <td>
                      <div class="d-flex justify-content-between">
                          <a href="/manajemen-produk/{{ $produck->slug }}/edit"><div class="badge bg-warning"><i class="bi bi-pencil-square"></i></div></a>
                          <form action="/tinjau/{{ $produck->id }}" method="post">@csrf
                              <button  type="submit" class="badge bg-primary border-0"><i class="bi bi-eye-fill"></i></button>
                          </form>
                          <form action="/disetujui/{{ $produck->id }}" method="post">@csrf
                              <button  type="submit" class="badge bg-success border-0"><i class="bi bi-check"></i></button>
                          </form>
                          <form action="/ditolak/{{ $produck->id }}" method="post">@csrf
                              <button  type="submit" class="badge bg-info border-0"><i class="bi bi-x"></i></button>
                          </form>
                          <form action="/manajemen-produk/{{ $produck->id }}" method="post">@csrf
                            @method('delete')
                              <button onclick="return confirm('yakin mau dihapus?')" type="submit" class="badge bg-danger border-0"><i class="bi bi-trash"></i></button>
                          </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {{ $producks->links() }}
              </div>
            </div>
      </div>

      {{-- contributor --}}
    <div class="row mt-5">
      <div class="col-md-12 shadow px-4 overflow-auto">
        <div class="col-md-3">
          <h5 class="my-4 bg-dark text-center px-3 py-2 rounded text-white"><i class="bi bi-card-image"></i> Permintaan Kontributor</h5>
        </div>
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kontributor</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($contributors as $contributor)
              <tr>
                <td>{{ ++$no_c }}</td>
                <td>{{ $contributor->user->nama }}</td>
                <td>{{ $contributor->nama }}</td>
                <td>Rp.{{ number_format($contributor->harga) }}</td>
                <td>
                  <div class="d-flex">
                      <form action="/cek/{{ $contributor->id }}" method="post" class="ms-2">@csrf
                          <button type="submit" class="badge bg-warning border-0">cek</button>
                      </form>
                      <form action="/setuju/{{ $contributor->id }}" method="post" class="ms-2">@csrf
                          <button type="submit" class="badge bg-success border-0">Setuju</button>
                      </form>
                      <form action="/tolak/{{ $contributor->id }}" method="post" class="ms-2">@csrf
                        <button type="submit" class="badge bg-danger border-0">Tolak</button>
                      </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            {{ $contributors->links() }}
          </div>
      </div>
    </div>
    </div>

    
  @endcan

  @can('duo')
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12 shadow px-4 overflow-auto">
          <div class="col-md-3">
              <h5 class="my-4 bg-dark text-center px-3 py-2 rounded text-white"><i class="bi bi-card-image"></i> Data Produk</h5>
          </div>
          @if (Session::has('pesan'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('pesan') }}
            <button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Status Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($designs as $produck)
              <tr>
                <td>{{ ++$no_d }}</td>
                <td>{{ $produck->nama }}</td>
                <td>{{ $produck->category->nama }}</td>
                <td>{{ $produck->status }}</td>
                <td>Rp.{{ number_format($produck->harga) }}</td>
                <td>
                  <div class="d-flex justify-content-around">
                      <a href="/manajemen-produk/{{ $produck->slug }}/edit"><div class="badge bg-warning"><i class="bi bi-pencil-square"></i></div></a>
                      <form action="/manajemen-produk/{{ $produck->id }}" method="post">@csrf
                        @method('delete')
                          <button onclick="return confirm('yakin mau dihapus?')" type="submit" class="badge bg-danger border-0"><i class="bi bi-trash"></i></button>
                      </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            {{ $designs->links() }}
          </div>
        </div>
      </div>
    </div>
  @endcan
@endsection