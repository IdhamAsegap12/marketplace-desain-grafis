@extends('dashboard.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Produk/ Edit</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/manajemen-produk/{{ $produck->id }}" method="post">@csrf @method('put')
                    <div class="mt-2">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control w-100 @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="nama" value="{{ $produck->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control w-100 @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="slug" value="{{ $produck->slug }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="category_id">Kategori</label>
                        <select class="form-select form-select @error('category_id') is-invalid @enderror" aria-label=".form-select-lg example" name="category_id">
                            @foreach ($categories as $category)
                                @if (old('category_id', $produck->category_id) == $category->id)
                                    <option  value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                                @else
                                    <option  value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endif
                            @endforeach
                          </select>
                          @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="harga">Harga</label>
                        <select class="form-select  @error('harga') is-invalid @enderror" aria-label=".form-select-lg example" name="harga">
                            <option @if($produck->harga == '50000') selected @else  @endif value="50000">Rp.50.000</option>
                            <option @if($produck->harga == '100000') selected @else  @endif value="100000">Rp.100.000</option>
                            <option @if($produck->harga == '250000') selected @else  @endif value="250000">Rp.250.000</option>
                          </select>
                          @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="validationTextarea" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" style="height: 300px;" id="validationTextarea" placeholder="Masukan deskripsi desain" name="deskripsi" required>{{ $produck->deskripsi }}</textarea>
                        @error('deskripsi')
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

    <script>
        const title = document.querySelector("#nama");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });
</script>
@endsection