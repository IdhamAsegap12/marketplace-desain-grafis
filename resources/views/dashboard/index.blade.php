@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dasbor</h1>
        <div class="py-2 d-flex align-items-center">
            <div class="overflow-hidden rounded-circle" style="height: 50px; width: 50px;">
                @if ($profil->image)
                    <img src="{{ asset('storage/'. $profil->image) }}"   style="object-fit: cover; height: 100%; width: 100%;  alt="">
                @else
                    <img src="{{ asset('img/K31.jpg') }}"  style="object-fit: cover; height: 100%; width: 100%;  alt="">
                @endif
            </div>
            <h5 class="mx-2">{{ auth()->user()->nama }}</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center mt-2">
            <h2 class="mb-1 h3">User</h2>
            <div class="box bg-dark">
                <div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">
                    <h1 class="text-white" style="font-size: 80px"><i class="bi bi-people"></i></h1>
                    <h4 class="text-white">{{ $users->count() }} orang</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center mt-2">
            <h2 class="mb-1 h3">Produk</h2>
            <div class="box bg-dark">
                <div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">
                    <h1 class="text-white" style="font-size: 80px"><i class="bi bi-vector-pen"></i></h1>
                    <h4 class="text-white">{{ $producks->count() }} buah</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center mt-2">
            <h2 class="mb-1 h3">Pendapatan</h2>
            <div class="box bg-dark">
                <div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">
                    <h1 class="text-white" style="font-size: 80px"><i class="bi bi-wallet2"></i></h1>
                    <h4 class="text-white">Rp.{{ number_format($pendapatan) }}</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <h2>Data Desainer</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Desainer</th>
              <th scope="col">Jumlah Desain</th>
              <th scope="col">Pendapatan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($designers as $designer)
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $designer->nama }}</td>
              <td>{{ $designer->producks->count()}}</td>
              <td>Rp. {{ number_format($designer->pendapatans->sum('jml_pendapatan')) }}</td>
              <td><a href="/desainer/detail/{{ $designer->user_name }}"><div class="badge bg-dark"><i class="bi bi-eye-fill"></i></div></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
@endsection