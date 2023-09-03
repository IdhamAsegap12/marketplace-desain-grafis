@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unduh Produk</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($downloads as $download)
                <div class="col-md-3 m-3 shadow p-4 ">
                    <div class="overflow-hidden d-flex justify-content-center w-100" style="height: 300px;">
                        <img class="w-100" src="{{ asset('storage/'. $download->image) }}" alt="">
                    </div>
                    
                    <div class="dropdown mt-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Download
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <form action="/unduh/{{ $download->id }}">
                                    <input type="hidden" name="id" value="{{ $download->id }}">
                                    <button type="submit" class="btn bg-0">Download Desain</button>
                                </form>
                            </li>
                            <li>
                                <form action="/download-lisensi">
                                    <input type="hidden" name="id" value="{{ $download->id }}">
                                    <button type="submit" class="btn bg-0">Download Lisensi</button>
                                </form>
                            </li>
                        </ul>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection