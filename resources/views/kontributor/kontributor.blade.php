@extends('layout.main')

@section('content')
    <div class="container mt-m">
        <div class="row">
            @if(Session::has('pesan'))
                <div class="alert alert-warning alert-dismissible fade show">
                    {{ Session::get('pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <small>A R E A &nbsp; T E S</small>
            <h1>KONTRIBUTOR</h1>
            <div class="col-md-12 shadow p-5">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                        <div class="overflow-hidden shadow rounded" style="height: 500px; width: 500px;">
                            <img src="{{ asset('img/K77a.jpg') }}" width="500" height="500" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <h4>I N S T R U K S I</h4>
                        <p align="justify">Untuk dapat menajadi desainer grafis di Getsu Design, calon desainer harus mengikuti tes terlebih dahulu dengan cara mengirim karya desainya, yang nanti karya desain tersebut akan di nilai. bila berhasil, nanti  akan mendapatkan pesan pemberitahuan bahwa kamu lolos tes dan desain yang dikirim akan langsung tampil pada halaman produk.</p>
                        <p align="justify">Bila kamu gagal, kamu masih bisa mengikuti tes sampai bisa lolos. jadi jangan menyerah teruslah berusaha, dan buatlah desain kamu menjadi lebih baik dari sebelumnya.</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row justify-content-center mt-5">
            <div class="col-md-12 d-flex-justify-content-center shadow p-5">

               <form action="/kontributor" method="post" enctype="multipart/form-data">@csrf
                <div class="">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan nama desain anda" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Masukan slug desain anda" value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category_id" id="category" class="form-select @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="harga" class="form-label">Harga</label>
                    <select name="harga" id="harga" class="form-select @error('harga') is-invalid @enderror">
                        <option>Pilih harga</option>
                        <option @if(old('harga') == '50000') selected  @endif value="50000">Rp.50.000</option>
                        <option @if(old('harga') == '100000') selected  @endif value="100000">Rp.100.000</option>
                        <option @if(old('harga') == '150000') selected  @endif value="150000">Rp.150.000</option>
                    </select>
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="image" class="form-label">Gambar(Format jpg/png ukuran 500 x 500PX dengan ukuran file tidak lebih dari 2MB )</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="image" class="form-label">Zip File(File yang dimasukan terdapat 3 file, yaitu SVG,JPG,PNG dengan ukuran 500 x 500PX dan file tidak lebih dari 4MB )</label>
                    <input type="file" class="form-control @error('zip') is-invalid @enderror" name="zip">
                    @error('zip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="deskripsi" class="form-label">Deskripsi Desain</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-check mt-2">
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
                <div class="mt-2">
                    <button type="submit" class="w-100 btn btn-primary">Upload</button>
                </div>
               </form>
            </div>
        </div>
    
        <script>
            const nama = document.querySelector("#nama");
            const slug = document.querySelector("#slug");
    
            nama.addEventListener("keyup", function() {
                let preslug = nama.value;
                preslug = preslug.replace(/ /g,"-");
                slug.value = preslug.toLowerCase();
            });
        </script>
    </div>

    
@endsection