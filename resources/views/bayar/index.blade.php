@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <div class="row">
            <div class="col-md-12 shadow rounded p-4 py-5">
                <div class="row justify-content-around">
                    <div class="col-md-4 mb-5">
                        <div class="shadow rounded p-4 d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-warning mb-2 me-auto">
                                {{ $transaksi->reference}}
                            </div>
                            <div class="overflow-hidden rounded-3 position-relative d-flex flex-column justify-content-center align-items-center" style="width: 370px; height: 300px;">
                                <img src="{{ asset('img/wm.png') }}" class="position-absolute" style="object-fit: cover; height: 100%; width: 100%;" alt="">
                                @if($produck[0]->image)
                                    <img src="{{ asset('storage/'. $produck[0]->image) }}" style="object-fit: cover; height: 100%; width: 100%;" alt="">
                                @else
                                    <img src="https://source.unsplash.com/random/?" width="500" height="400" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class=" shadow rounded p-4 d-flex flex-column align-items-center justify-content-center">
                            <div class="shadow-sm p-2 my-2 rounded border w-100">
                                <h5 class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(66, 66, 66);">C E N E L &nbsp; P E M B A Y A R A N</h5>
                                <h4 class="text-center fw-normal" style="font-size: 18pt; color: rgb(160, 160, 160);">{{ $transaksi->payment_name }}</h4>
                            </div>
                            <div class="shadow-sm p-2 my-2 rounded border w-100">
                                <h5 class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(66, 66, 66);">T O T A L &nbsp; P E M B A Y A R A N</h5>
                                <h4 class="text-center fw-normal" style="font-size: 14pt; color: rgb(56, 56, 56);">+(Biaya Admin) Rp.{{ number_format($transaksi->total_fee) }}</h4>
                                <h4 class="text-center fw-normal" style="font-size: 18pt; color: rgb(160, 160, 160);">Rp.{{ number_format($transaksi->amount) }}</h4>
                            </div>
                            <div class="shadow-sm p-2 my-2 rounded border w-100">
                                <h5 class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(66, 66, 66);">C O D E &nbsp; P E M B A Y A R A N</h5>
                                <h4 class="text-center fw-normal" style="font-size: 18pt; color: rgb(160, 160, 160);">{{ $transaksi->pay_code }}</h4>
                            </div>
                            
                            
                            <div class="badge py-2 px-3 fw-light" style="background-color: rgb(110, 110, 110)">Berlaku Hingga 24 Jam</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 shadow rounded p-4 py-5 my-5">
                <h3 class="mb-3" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(66, 66, 66);">I N S T R U  K S I</h3>
                @foreach ($transaksi->instructions as $instruksi)
                <h3 class="mb-3 h5" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(148, 148, 148);">{{ $instruksi->title }}</h3>
                <ol class="list-group list-group-numbered w-100 mb-5">
                    @foreach ($instruksi->steps as $step)
                        <li class="list-group-item disabled">{!! $step !!}</li>
                    @endforeach
                </ol>
                @endforeach
            </div>
        </div>
    </div>
@endsection