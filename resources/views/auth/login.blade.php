@extends('layout.main')

@section('content')

  <div class="container">
    <div class="row justify-content-center align-items-center mt-m">
      <div class="col-lg-3 d-flex flex-column">
        <img class="mb-4 m-auto" src="{{ asset('img/logo.png') }}" alt="" width="72">
        <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>
        @if (Session::has('pesan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           {{ Session::get('pesan') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/masuk" method="post">@csrf
          <div class="form-floating">
            <input type="email" class="form-control rounded-0" id="floatingInput" name="email" placeholder="email" value="{{ old('email') }}">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control rounded-0" style="margin-top: -1px" name="password" id="password" placeholder="kata sandi">
            <label for="password">Kata Sandi</label>
          </div>
          <div class="d-flex">
            <a href="/lupa-password" class="text-decoration-none ms-auto my-1">Lupa kata sandi</a>
          </div>
          <button class="w-100 btn btn-lg btn-primary rounded-0" type="submit">Masuk</button>
          <small class=" d-block text-center mt-1">Belum punya akun? <a href="/daftar" class="text-decoration-none">daftar</a></small>
      </form>
      </div>
    </div>
  </div>

@endsection