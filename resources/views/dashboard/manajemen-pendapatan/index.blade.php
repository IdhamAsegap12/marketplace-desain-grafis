@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Manajemen Pendapatan</h1>
  <h5 class="bg-dark text-white px-3 py-2 rounded"><i class="bi bi-wallet2"></i> Rp.{{ number_format($pendapatan->sum('jml_pendapatan')) }}</h5>
</div>
@if (Session::has('pesan'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 shadow py-3 px-4">
      <div class="col-md-3">
        <h5 class="my-4 bg-dark text-center px-3 py-2 rounded text-white"><i class="bi bi-file-earmark-arrow-down"></i> Produk yang terdownload</h5>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Pendapatan</th>
          </tr>
        </thead>
        <tbody>
          {{-- pencairan --}}
          @can('desainer')
            @if($pendapatan->sum('jml_pendapatan') >= 1000000)
            <a href="/pencairan/{{ auth()->user()->user_name}}" class="btn btn-primary">Pencairan</a>
            @else
            <a href="#" class="btn btn-primary disabled">Pencairan</a>
            @endif
            <p class="my-2"><small class="fst-italic text-info">-Pencairan dapat dilakukan setelah pendapatan mencapai Rp.1000.000-</small></p>
          @endcan
          {{-- end pencairan --}}
          @foreach ($pendapatan as $p)
          <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $p->produck->nama }}</td>
            <td>{{ $p->produck->category->nama }}</td>
            <td>Rp.{{ $p->jml_pendapatan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- konfirmasi --}}
    @can('admin')
      @foreach($pencairan as $p)
        @if ($p->status == 'dalam proses')
          <div class="col-md-12 shadow px-5 py-3 mt-5 rounded">
            <div class="row">
              <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <small>Nama</small>
                <h5>{{ ucfirst($p->nama) }}</h5>
              </div>
              <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <small>Jumlah Pencairan</small>
                <h5>Rp{{ number_format($p->jml_pencairan) }}</h5>
              </div>
              <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <small>No.Rek</small>
                <h5>{{ strtoupper($p->bank) }} {{$p->no_rek }}</h5>
              </div>
              <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <form action="/pencairan/confirm/{{ $p->id }}" method="post">@csrf
                  <button type="submit" class="btn bg-success border-0 text-white"><i class="bi bi-check2-square"></i></i></button>
                </form>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    @endcan

    {{-- Status --}}
    @can('desainer')
    @foreach($pencairanUser as $p)
      <div class="col-md-12 shadow px-5 py-3 mt-5 rounded">
        <div class="row">
          <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
            <small>Nama</small>
            <h5>{{ ucfirst($p->nama) }}</h5>
          </div>
          <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
            <small>Bank</small>
            <h5>{{ strtoupper($p->bank) }}</h5>
          </div>
          <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
            <small>No.Rek</small>
            <h5>{{ $p->no_rek }}</h5>
          </div>
          <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
            <small>Status</small>
            <small><div class="badge bg-warning rounded-pill">{{ strtoupper($p->status) }}</div></small>
          </div>
        </div>
      </div>
    @endforeach
    @endcan
  </div>
</div>


@endsection