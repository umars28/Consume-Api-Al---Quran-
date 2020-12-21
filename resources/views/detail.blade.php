<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Al - Quran</title>
  </head>
  <body>

    <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mb-5">
    <div class="container">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
      <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Al - Quran <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('list.surah') }}">List Surah <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- End Navbar -->

  <!-- Start Search -->
  <div class="container mt-5 pt-5">
    <div class="row text-center justify-content-center">
        <div class="col-md-4">
            @if (\Route::current()->getName() == 'index')
            <form action="{{ route('surah') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="search" class="form-label alert-danger btn btn-primary mt-3">Search Surah</label>
                  <input type="text" name="surah" class="form-control @error('surah') is-invalid @enderror" id="search" placeholder="Masukkan Nomor Surah" autofocus>
                  @error('surah')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
              </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('tafsir') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="search2" class="form-label alert-danger btn btn-danger mt-3">Search Tafsir</label>
                  <input type="text" name="surah2" class="form-control @error('surah2') is-invalid @enderror" id="search2" placeholder="Masukkan Nomor Surah" autofocus>
                  @error('surah2')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
              </form>
              @else
              <a href="{{ route('index') }}" class="btn btn-outline-primary alert-danger">Search Again</a>
              @endif
        </div>
    </div>
  </div>
  <!-- End Search -->

  <!-- Start Content -->
  <section class="about bg-light" id="about">
    <div class="container text-center">
        <div class="row justify-content-center text-justify pb-5 mt-5 pt-3">
            <div class="col-md-6 sm-4">
                <h2 class="mt-5 pt-4 mb-3">Surah {{ $detailSurah['nama_latin'] }}</h2>
                <div class="mb-3">
                    <audio controls autoplay>
                        <source src="{!! $detailSurah['audio'] !!}" type="audio/ogg">
                    </audio>
                </div>
                <li>Nomor Surah : {{ $detailSurah['nomor'] }}</li>
                <li>Nama Surah : {{ $detailSurah['nama'] }}</li>
                <li>Nama Latin : {{ $detailSurah['nama_latin'] }}</li>
                <li>Jumlah Ayat : {{ $detailSurah['jumlah_ayat'] }}</li>
                <li>Tempat Turun : {{ $detailSurah['tempat_turun'] }}</li>
                <li>Arti : {{ $detailSurah['arti'] }}</li>
                <li>Deskripsi : {!! $detailSurah['deskripsi'] !!}</li> <br/>
            </div>
            <div class="col-md-6 sm-8">
                <ol>
                    <h2 class="mt-5 pt-4 mb-4">List Surah</h2>
                    @foreach ($listSurah->json() as $surah)
                        <li class="mb-4"><a href="{{ route('detail.surah', $surah['nomor']) }}">{{ $surah['nama_latin'] }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
  </section>
  <!-- End Content -->

  <!-- Footer -->
  <section class="footer" id="footer">
    <footer class="navbar-nav bg-outline-danger text-center pt-4 pb-3">
      <h6>&#169; Copyright by Umar Sabirin</h6>
    </footer>
  </section>
  <!-- End Footer -->







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="app.js" type="text/javascript"></script>
  </body>
</html>
