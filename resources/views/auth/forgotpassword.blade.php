@extends('layout.main')

@section('content')
   <div class="container">
    <div class="row justify-content-center mt-m">
        <div class="col-md-3 d-flex flex-column">
            <img class="mb-4 m-auto" src="{{ asset('img/logo.png') }}" alt="" width="72">
            <h1 class="h3 fw-normal text-center">Lupa Kata Sandi</h1>
            @if (Session::has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form action="/lupa-password" method="post">@csrf
                <div class="form-floating">
                    <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="email">
                    <label for="email">Email</label>
                </div>
                <button type="submit" class="w-100 btn-lg btn btn-primary rounded-0">Kirim</button>
            </form>
        </div>
    </div>
   </div>
@endsection