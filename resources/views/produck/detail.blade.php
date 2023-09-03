@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <div class="row">
            @if($produck[0]->status == 'disetujui')
            <div class="col-md-6 d-flex justify-content-center align-items-center p-3">
                <div class="overflow-hidden shadow rounded position-relative" style="height: 500px; width: 500px;">
                    {{-- wm --}}
                    <img src="{{ asset('img/wm.png') }}" class="position-absolute" class="w-100" alt="">

                    {{-- Produk --}}
                    @if ($produck[0]->image)
                        <img src="{{ asset('storage/'.$produck[0]->image) }}" class="w-100" alt="">
                    @else
                        <img src="https://source.unsplash.com/random/?{{ $produck[0]->nama }}" class="w-100" alt="...">   
                    @endif
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-center">
                <div class="ps-2">
                    <h1>{{ $produck[0]->nama }}</h1>
                    <h5>From <a href="/desainer/detail/{{ $produck[0]->user->user_name }}" class="text-decoration-none fs-6">{{ $produck[0]->user->nama }}</a></h5>
                    <p align="justify">{{ $produck[0]->deskripsi }}</p>
                    <h3>File</h3>
                    <p>JPG, PNG, SVG</p>
                    <h3 class="mb-3">Rp.{{ number_format($produck[0]->harga) }}</h3>
                    @if($produck[0]->status == 'terjual')
                        <h2 class="bg-dark text-white py-2 px-3 rounded text-center">TERJUAL</h2>
                    @else
                        <div class="d-flex">
                            <a href="/beli/{{ $produck[0]->slug }}" class="btn btn-success"><i class="bi bi-bag-fill"></i> Beli</a>
                            <form action="/tambah-keranjang/{{ $produck[0]->id }}" method="post">@csrf
                                <button type="submit" class="btn btn-primary ms-2"><i class="bi bi-bag-plus-fill"></i> Tambah Keranjang</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
        <div class="border-bottom my-5"></div>
        <h2>Desain Lainnya</h2>
        <div class="row">
            @foreach ($produck[0]->user->producks as $produck)
                @if($produck->status == 'disetujui')
                <div class="col-md-4 mt-2 d-flex justify-content-center">
                    <div class="overflow-hidden d-flex position-relative" style="height: 22rem; width: 25rem">
                        <img src="{{ asset('img/wm.png') }}" class="position-absolute" style="object-fit: cover; height: 100%; width: 100%;" alt="">
                        @if ($produck->image)
                            <img src="{{ asset('storage/'. $produck->image ) }}" style="object-fit: cover; height: 100%; width: 100%;" " alt="..."> 
                        @else
                            <img src="https://source.unsplash.com/random/?{{ $produck->nama }}" style="object-fit: cover; height: 100%; width: 100%;" alt="...">   
                        @endif
                        <div class="position-absolute mt-2 ms-2 d-flex">
                            <p class="site-header text-white px-3 py-2 rounded "><a href="/category/{{ $produck->category->slug }}" class="text-decoration-none text-white">{{ $produck->category->nama }}</a></p>
                            <p class=" ms-2 site-header text-white px-3 py-2 rounded ">{{ $produck->nama }}</p>
                        </div>
                        <div class="position-absolute mt-2 ms-2 d-flex " style="top: 300px">
                            <a href="/produk/detail/{{ $produck->slug }}" class="btn btn-primary rounded px-4">Detail</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection