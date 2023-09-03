@extends('layout.main')

@section('content')

  <div class="container">
    <div class="row justify-content-center align-items-center mt-m">
      <div class="col-lg-3">
        <form action="/daftar" method="post" class="d-flex flex-column">@csrf
          <img class="mb-4 m-auto" src="{{ asset('img/logo.png') }}" alt="" width="72">
          <h1 class="h3 mb-3 fw-normal text-center">Daftar</h1>
          <div class="form-floating">
            <input type="text" class="form-control rounded-0 @error('nama') is-invalid  @enderror" id="nama" name="nama" placeholder="nama" value="{{ old('nama') }}">
            <label for="nama">Nama</label>
            @error('nama')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" class="form-control rounded-0 @error('user_name') is-invalid  @enderror" style="margin-top: -1px" name="user_name" id="user_name" placeholder="nama pengguna" value="{{ old('user_name') }}">
            <label for="user_name">Nama Pengguna</label>
            @error('user_name')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" class="form-control rounded-0 @error('email') is-invalid  @enderror" style="margin-top: -1px" name="email" id="email" placeholder="email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating">
            <input type="hidden"  style="margin-top: -1px" name="level" id="email" placeholder="email" value="customer">
          </div>
          <div class="form-floating">
            <input type="password" class="form-control rounded-0 @error('password') is-invalid  @enderror" style="margin-top: -1px" name="password" id="password" placeholder="password">
            <label for="password">Kata Sandi</label>
            @error('password')
                {{ $message }}
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control rounded-0 @error('password') is-invalid  @enderror" style="margin-top: -1px" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            @error('password')
                {{ $message }}
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary rounded-0" type="submit">Daftar</button>
          <small class="text-center mt-1">Sudah punya akun? <a href="/masuk" class="text-decoration-none">masuk</a></small>
      </form>
      </div>
    </div>
  </div>

@endsection