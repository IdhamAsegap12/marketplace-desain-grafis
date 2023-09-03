@extends('layout.main')

@section('content')

<main class="mb-5">
  <div class="container mb-5 ">
    <div class="row">
      <div class="col-md-12 shadow pt-5 px-5 mt-m">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner" style="height: 35rem">
            <div class="carousel-item active position-relative">
              <img src="{{ asset('img/bg/1.png') }}" class="bd-placeholder-img" style="height: 600px;" >
              <div class="col-md-12 position-absolute d-flex flex-column align-items-center px-4" style="margin-top: 100px">
                <img src="{{ asset('img/bg/1a.png') }}" class="img-fluid" >
              </div>
      
              <div class="container">
                <div class="carousel-caption text-start">
                  {{-- <h1>Ayo daftar sekarang.</h1>
                  <p>Dan cari desain yang kamu inginkan</p>
                  <p><a class="btn btn-lg btn-primary" href="/daftar">Daftar</a></p> --}}
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/bg/2.png') }}" class="bd-placeholder-img" style="height: 600px;" >
      
              <div class="container">
                <div class="carousel-caption">
                  {{-- <h1>Banyak produk desain yang tersedia</h1>
                  <p>Jadi gak perlu nunggu lama bikin desain</p>
                  <p><a class="btn btn-lg btn-primary" href="/produk">Produk</a></p> --}}
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/bg/3.png') }}" class="bd-placeholder-img" style="height: 600px;" >
      
              <div class="container">
                <div class="carousel-caption text-end">
                  {{-- <h1>Banyak desainer profesional</h1>
                  <p>Kamu bisa liat langsung karya-karyanya biar percaya</p>
                  <p><a class="btn btn-lg btn-primary" href="/desainer">Desainer</a></p> --}}
                </div>
              </div>
      
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    {{-- <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row --> --}}


    <!-- START THE FEATURETTES -->

    {{-- <hr class="featurette-divider"> --}}

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Asset Game <span class="text-muted">2D</span></h2>
        <p class="lead">Perlu asset game 2d buat game kamu? kamu tepat sudah datang kesini, terdapat banyak asset game 2d yang tersedia disini.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{ asset('img/k71.jpg') }}" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Desain<span class="text-muted">Logo</span></h2>
        <p class="lead">Jaman sekarang belum punya logo sendiri? apa kata dunia. Cari logo kamu disini, tersedia banyak logo dan kamu dapat memilihnya sesuka hati.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{ asset('img/k73.jpg') }}" width="500" height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Desain<span class="text-muted">Animasi</span></h2>
        <p class="lead">Butuh animasi lucu? atau mau yang super duper keren? oh atau mau yang sangar? Semuanya ada disini. jadi tunggu apalagi ayo cari sekarang</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="{{ asset('img/k82.jpg') }}" width="500" height="500">

      </div>
    </div>

    

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
</main>

@endsection