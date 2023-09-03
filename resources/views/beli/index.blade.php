@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <h1>Instruksi</h1>
                <p align="justify">Untuk melakukan pembelian, silahkan costumer menekan metode pembayaran yang ingin digunakan, ketika metode pembayaran di tekan maka akan otomatis menuju kehalaman pembayaran, yang dimana pada halaman tersebut terdapat kode pembayaran dan intruksi bagaimana cara melakukan pembayarannya. </p>
                <h4 class="mb-3">Pilih Mtode Pembayaran</h4>
                <div class="row">
                    <form action="/bayar" method="post">@csrf
                        <input type="hidden" name="produckId" value="{{ $produck->id }}">
                        @foreach ($chanels as $chanel)
                        <div class="shadow-sm p-3 my-3 rounded">
                            <input type="hidden"  value="">
                            <div class=" bg-white d-flex  align-items-center p-2 pt-4">
                                <input class="form-check-input" type="radio" id="checkboxNoLabel" value="{{ $chanel->code }}" name="method" required>
                                <div class="d-flex justify-content-center ms-2">
                                    <img src="{{ $chanel->icon_url }}" width="100" alt="">
                                </div>
                                <p class="text-center mt-2">{{ $chanel->name }}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-check my-3">
                            <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" value="setuju" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Menyetujui <a href="/terms-condition" class="text-decoration-none">syarat dan ketentuan</a>
                            </label>
                            @error('terms')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Bayar</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 p-4 d-flex flex-column justify-content-center align-items-center p-0">
                <div class="overflow-hidden shadow rounded position-relative" style="width: 500px; height: 500px;">
                    <img src="{{ asset('img/wm.png') }}" class="position-absolute" height="500" alt="">
                    @if($produck->image)
                        <img src="{{ asset('storage/'. $produck->image) }}" class="w-100" alt="">
                    @else
                        <img src="https://source.unsplash.com/random/" class="w-100" alt="">
                    @endif
                </div>
                <h4 class="my-5 bg-dark p-3 rounded text-white">Harga Rp. {{ number_format($produck->harga) }}</h4>
            </div>
        </div>
    </div>
@endsection

