@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <div class="row py-3 border-bottom">
            <div class="col-md-2 d-flex justify-content-center">
                <div class="overflow-hidden rounded-circle shadow d-flex flex-column justify-content-center align-items-center" style="height: 200px; width: 200px;">
                    @if($user->image)
                        <img src="{{ asset('storage/'. $user->image) }}"  style="object-fit: cover; height: 100%; width: 100%; alt="">
                    @else
                        <img src="https://source.unsplash.com/random/?man" style="object-fit: cover; height: 100%; width: 100%; alt="">
                    @endif
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <h2>{{ $user->nama }}</h2>
                <p align="justify">{{ $user->pengalaman }}</p>
                <ul class="nav col-md-4  list-unstyled d-flex m-0 p-0">
                    @if($user->twitter)
                    <li class="ms-3"><a class="text-muted" href="{{ $user->twitter }}"><svg class="bi" width="20" height="20"><use xlink:href="#twitter"/></svg></a></li>
                    @endif
                    @if($user->instagram)
                    <li class="ms-3"><a class="text-muted" href="{{ $user->instagram }}"><svg class="bi" width="20" height="20"><use xlink:href="#instagram"/></svg></a></li>
                    @endif
                    @if($user->facebook)
                    <li class="ms-3"><a class="text-muted" href="{{ $user->facebook }}"><svg class="bi" width="20" height="20"><use xlink:href="#facebook"/></svg></a></li>
                    @endif
                  </ul>
            </div>
        </div>

        <h1 class="my-4">Porto Folio</h1>

        <div class="row">
            @foreach ($user->producks as $produck)
                @if($produck->status == 'disetujui')
                <div class="col-md-4 mt-2 d-flex justify-content-center">
                    <div class="overflow-hidden d-flex position-relative" style="height: 22rem; width: 25rem">
                        <img src="{{ asset('img/wm.png') }}" class="position-absolute" class="w-100" alt="">
                        @if ($produck->image)
                            <img src="{{ asset('storage/'. $produck->image ) }}" class=" w-100" " alt="..."> 
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
                @endif
            @endforeach
        </div>
    </div>
@endsection


