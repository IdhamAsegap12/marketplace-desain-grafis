@extends('layout.main')

@section('content')
<div class="container mt-m">
  <h1 class="border-bottom py-3">Desainer</h1>

  <div class="row">
      @foreach ($users as $user)
          <div class="col-md-4 d-flex flex-column mt-5">
            <div class="position-relative rounded-circle overflow-hidden shadow-sm d-flex flex-column justify-content-center align-items-center m-auto" style="width: 200px; height: 200px;">
                <div class="overflow-hidden shadow rounded-circle d-flex flex-column align-items-center justify-content-center" style="width: 200px; height: 200px;">
                    @if($user->image)
                        <img src="{{ asset('storage/'. $user->image) }}"  style="object-fit: cover; height: 100%; width: 100%;" alt="{{ $user->nama }}">
                    @else
                        <img src="https://source.unsplash.com/random/?man" style="object-fit: cover; height: 100%; width: 100%;" alt="Gambar Random">
                    @endif
                </div>
            </div>
            <div class=" m-auto mt-3 d-flex justify-content-center">
                <a href="/desainer/detail/{{ $user->user_name }}" class="py-2 btn-primary rounded-start text-decoration-none px-2">Detail</a>
                <div class="bg-dark d-flex flex-column align-items-center rounded-end pt-2 px-3">
                    <p class="text-white">{{ $user->nama }}</p>
                </div>
            </div>
          </div>
      @endforeach
  </div>

  <div class="d-flex justify-content-center my-5">
      {{ $users->links() }}
  </div>
</div>
@endsection