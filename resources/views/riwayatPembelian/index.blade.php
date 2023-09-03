@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Riwayat Pembelian</h1>
    </div>
    
    <div class="container">
        <div class="row">
            @foreach ($transaksi as $transaksi)
                <div class="col-md-12 shadow p-4 rounded my-4 p-0">
                    <div class="row justify-content-center">
                        <div class="col-md-2 d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <small class="fw-bold">Nama Pembeli</small>
                                <h5 style="color: rgb(117, 117, 117)">{{ $transaksi->user->nama }}</h5> 
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <small class="fw-bold">Produk</small>
                                <h5 style="color: rgb(117, 117, 117)"><a href="/bayar/{{ $transaksi->reference }}/{{ $transaksi->produck->slug }}" class="text-decoration-none">{{ $transaksi->produck->nama }}</a></h5>
                                <small>{{ $transaksi->produck->category->nama }}</small>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <small class="fw-bold">Total Harga</small>
                                <h5 style="color: rgb(117, 117, 117)">Rp.{{ number_format($transaksi->total_amount) }}</h5>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <small class="fw-bold">Kode Referensi</small>
                                <h5 style="color: rgb(117, 117, 117)">{{ $transaksi->reference }}</h5>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <small class="fw-bold">Status</small>
                                <p><div class="badge bg-warning px-3 py-2 rounded-pill">{{ strtoupper($transaksi->status) }}</div></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection