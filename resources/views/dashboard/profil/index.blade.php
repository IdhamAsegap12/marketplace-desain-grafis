@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 shadow rounded d-flex justify-content-center align-items-center  overflow-hidden m-0 p-0" style="height: 500px;">
                @if ($profil->image)
                    <img src="{{ asset('storage/'. $profil->image) }}" style="object-fit: cover; height: 100%; width: 100%;"  alt="">
                @else
                    <img src="https://source.unsplash.com/random/?man"  style="object-fit: cover; height: 100%; width: 100%;"  alt="">
                @endif
            </div>
            <div class="col-md-6 px-5">
                @if (Session::has('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('pesan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('profil.edit', $profil->user_name) }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama" style="font-size: 20px; ">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control w-100 py-3" value="{{ $profil->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user_name" style="font-size: 20px; ">Nama Pengguna</label>
                        <input type="text" name="user_name" id="user_name" class="form-control w-100 py-3" value="{{ $profil->user_name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email" style="font-size: 20px; ">Email</label>
                        <input type="text" name="email" id="email" class="form-control w-100 py-3" value="{{ $profil->email }}" disabled>
                    </div>
                    @can('duo')
                    <div class="mb-3">
                        <label for="instagram" class="form-label" style="font-size: 20px; ">Instagram</label>
                        <input type="text" class="form-control w-100 py-3" name="instagram" id="instagram" placeholder="Masukan link instagram kamu" value="{{ $profil->instagram }}">
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label" style="font-size: 20px; ">Facebook</label>
                        <input type="text" class="form-control w-100 py-3" name="facebook" id="facebook" placeholder="Masukan link facebook kamu" value="{{ $profil->facebook }}">
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label" style="font-size: 20px; ">Twitter</label>
                        <input type="text" class="form-control w-100 py-3" name="twitter" id="twitter" placeholder="Masukan link facebook kamu" value="{{ $profil->twitter }}">
                    </div>
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label" style="font-size: 20px; ">Pengalaman</label>
                        <textarea class="form-control" name="pengalaman" id="pengalaman" rows="3" placeholder="Masukan pengalaman kamu dalam dunia desainer grafis">{{ $profil->pengalaman }}</textarea>
                    </div> 
                    @endcan
                    <div class="mb-3">
                        <label class="form-label" for="image" style="font-size: 20px; ">Foto Profil</label>
                        <input type="file" name="image" id="image" class="form-control w-100 " value="{{ $profil->email }}">
                    </div>
                    <input type="hidden" name="oldImage" value="{{ $profil->image }}">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100 py-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection