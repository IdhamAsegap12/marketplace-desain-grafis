@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <h1 class="border-bottom py-3">Produk</h1>

        <div class="row">
            @foreach ($producks as $produck)
                <div class="col-md-4 mt-2 d-flex justify-content-center">
                    <div class="overflow-hidden d-flex position-relative" style="height: 22rem; width: 25rem">
                        <img src="{{ asset('img/wm.png') }}" class="position-absolute" style="object-fit: cover; height: 100%; width: 100%;" alt="">
                        @if ($produck->image)
                            <img src="{{ asset('storage/'. $produck->image ) }}" style="object-fit: cover; height: 100%; width: 100%;" " alt="..."> 
                        @else
                            <img src="https://source.unsplash.com/random/?{{ $produck->nama }}" class=" w-100" alt="...">   
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
            @endforeach
        </div>

        <div class="d-flex justify-content-center my-5">
            {{ $producks->links() }}
        </div>

    </div>
@endsection