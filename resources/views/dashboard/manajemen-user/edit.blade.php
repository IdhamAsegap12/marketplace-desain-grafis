@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen User/ Edit</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/manajemen-user/{{ $user->id }}" method="post">@csrf @method('put')
                    <div class="mt-2">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control w-100 @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="nama" value="{{ $user->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control w-100 @error('user_name') is-invalid @enderror" name="user_name" id="user_name" placeholder="user_name" value="{{ $user->user_name }}">
                        @error('user_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="email">Email</label>
                        <input type="text" class="form-control w-100 @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ $user->email }}" disabled>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="email">Level</label>
                        <select class="form-select form-select @error('level') is-invalid @enderror" aria-label=".form-select-lg example" name="level">
                            <option @if($user->level == 'admin') selected @else  @endif value="admin">Admin</option>
                            <option @if($user->level == 'desainer') selected @else  @endif value="desainer">Desainer</option>
                            <option @if($user->level == 'customer') selected @else  @endif value="customer">Customer</option>
                            <option @if($user->level == '') selected @else  @endif value="">Pilih Level</option>
                          </select>
                          @error('level')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection