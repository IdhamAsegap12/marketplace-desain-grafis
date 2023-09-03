@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Pendapatan/ Pencairan</h1>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('pesan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/pencairan" method="post" class="border p-3 rounded">@csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="status" value="null">
                    <div class="mt-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-lg @error('nama') is-invalid @enderror" placeholder="Isi nama sesuai nama pada rekening anda" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Bank</label>
                        <select name="bank" id=""  class="form-select form-select-lg @error('bank') is-invalid @enderror">
                            <option selected>Pilih Bank</option>
                            <option @if(old('bank') == 'bca') selected @endif value="bca">BCA</option>
                            <option @if(old('bank') == 'bri') selected @endif value="bri">BRI</option>
                            <option @if(old('bank') == 'bni') selected @endif value="bni">BNI</option>
                            <option @if(old('bank') == 'danamon') selected @endif value="danamon">DANAMON</option>
                        </select>
                        @error('bank')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">No.Rek</label>
                        <input type="text" name="no_rek" class="form-control form-control-lg @error('no_rek') is-invalid @enderror" placeholder="Isi nomer rekening anda" value="{{ old('no_rek') }}">
                        @error('no_rek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" value="setuju" id="flexCheckDefault" >
                        <label class="form-check-label" for="flexCheckDefault">
                            Menyetujui <a href="/terms-condition" class="text-decoration-none">syarat dan ketentuan</a>
                        </label>
                        @error('terms')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Kirim</button>
                    </div>
                </form>

                @foreach ($pencairan as $p)
                    <div class="col-md-12 shadow px-5 py-3 my-5 rounded">
                        <div class="row">
                            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                                <small>Nama</small>
                                <h5>{{ $p->nama }}</h5>
                            </div>
                            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                                <small>Bank</small>
                                <h5>{{ strtoupper($p->bank) }}</h5>
                            </div>
                            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                                <small>No.Rek</small>
                                <h5>{{ $p->no_rek }}</h5>
                            </div>
                            <div class="col-md-3 d-flex  justify-content-center align-items-center">
                                <form action="/pencairan/send/{{ $p->id }}" method="post">@csrf
                                    <button type="submit" class="btn bg-none border-0"><i class="bi bi-send-plus"></i></button>
                                </form>
                                <form action="/pencairan/delete/{{ $p->id }}" method="post">@csrf
                                    <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn bg-none border-0"><i class="bi bi-x-square"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection