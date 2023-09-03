@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen User</h1>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 shadow px-4 overflow-auto">
          <div class="col-md-3">
              <h5 class="my-4 bg-dark text-center px-3 py-2 rounded text-white"><i class="bi bi-person-circle"></i> Data User</h5>
          </div>
          @if (Session::has('pesan'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('pesan') }}
            <button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Level</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $user->nama }}</td>
                  <td>{{ $user->level}}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <div class="d-flex justify-content-around">
                        <a href="/manajemen-user/{{ $user->user_name }}/edit"><div class="badge bg-warning"><i class="bi bi-pencil-square"></i></div></a>
                        <form action="/manajemen-user/{{ $user->id }}" method="post">@csrf
                          @method('delete')
                            <button onclick="return confirm('yakin mau dihapus?')" type="submit" class="badge bg-danger border-0"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection