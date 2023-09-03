@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Notifikasi</h1>
</div>
<div class="container">
    <div class="row">
        @foreach ($notifs as $notif)
            <div class="col-md-12 shadow rounded position-relative p-3 my-4">
                <h4><i class="bi bi-bell-fill"></i> {{ $notif->tentang }}</h4>
                <small class="fw-bold">From {{ ucfirst($notif->pengirim) }}</small>
                <p align="justify">{!! $notif->isi !!}</p>
                <form action="/notifikasi/delete/{{ $notif->id }}" method="post" class="position-absolute" style="top: 0; right: 0;">@csrf
                    <button type="submit" class="bg-white border-0 m-2"><h5><i class="bi bi-x-circle"></i></h5></button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection