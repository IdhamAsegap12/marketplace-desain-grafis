@extends('layout.main')

@section('content')
    <div class="container mt-m">
        @if (Session::has('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @foreach ($keranjang as $item)
        <div class="col-md-12 d-flex shadow rounded p-4 my-4">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <d-flex class="flex-column">
                    <small>Produk</small>
                    <h4>{{ $item->nama_produk }}</h4>
                </d-flex>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="d-flex flex-column">
                    <small>Harga</small>
                    <h4>Rp.{{ number_format($item->harga) }}</h4>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="d-flex flex-column">
                    <a href="/beli/{{ $item->produck->slug }}" class="btn bg-none"><i class="bi bi-bag-fill"></i></a>
                    <form action="/hapus-keranjang/{{ $item->id }}" method="post">@csrf
                        <button type="submit" class="btn bg-none"><i class="bi bi-x-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection