<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styleku.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custome.css') ?>">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
  <title>IPMPK</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light text-white py-3" id="mainNav">
    <div class="container">
      <a href="<?= base_url('/home') ?>" class="navbar-brand js-scroll-trigger text-white">
        IPMPK
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto my-lg-0 my-2">
          <li class="nav-item">
            <a href="<?= base_url('home') ?>" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/profile') ?>" class="nav-link">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/artikel') ?>" class="nav-link">Berita & Event</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <section class="header-history">
    <div class="container h-100">
      <div class="row h-20 align-items-center justify-content-center text-center">
        <div class="col-lg-12 align-self-end">
          <h1 class="display-4 text-white align-middle text-center">Tentang Kami</h1>
          <hr class="divider my-2">
        </div>
      </div>
    </div>
  </section>
  <!-- Isi History -->
  <section class="isi-history">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-md-4">
          <img src="<?= base_url('assets/img/ipmpk.png') ?>" class="img-fluid">
        </div>
        <div class="col-md-8" id="col-isi-history">
          <h1 class="text-black font-weight-bold">IKATAN PELAJAR MAHASISWA PEMUDA KEMPAS</h1>
          <hr class="divider my-4">
          <p class="text-black ">IPMPK MERUPAKAN ORGANISASI YANG BERGERAK DI DESA KELURAHAN KEMPAS JAYA</p>
          <p class="text-justify">Organisasi Pelajar Mahasiswa Pemuda Kempas berdiri pada tahun 2017. IPMPK dipelopori dan didirikan oleh Taqrir M. Asri Saman juga sebagai ketua umum organisasi. Organisasi ditujukan untuk membentuk karakter, komunikasi dan solidaritas antar pemuda, mahasiswa, pelajar kempas supaya menjadi lebih baik.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="header-contact">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-12 align-self-end">
          <h1 class="display-4 text-white align-middle text-center">PENGURUS</h1>
          <hr class="divider my-4">
        </div>
      </div>
    </div>
  </section>

  <section class="isi-pengurus">
    <div class="container">
      <div class="row justify-content-around" id="row-profil">
        <div class="col-md-4" id="col-profil">
          <img src="<?= base_url('assets/img/img-005.jpg') ?>" class="img-thumbnail">
          <h4>BADAN PENGURUS INTI</h4>
          <P>Pengurus inti yaitu Takrir mas sebagai ketua umum, Ade Ruslan sebagai wakil ketua, Khairul Anwar sebagai seketrasi umum, M. Mariya sebagai bendahara Umum.</P>

        </div>
        <div class="col-md-4" id="col-profil">
          <img src="<?= base_url('assets/img/img-005.jpg') ?>" class="img-thumbnail">
          <h4>HUBUNGAN MASYARAKAT</h4>
          <p>Seksi yang mengurusi hubungan masyarakat dibina oleh beberapa seksi yaitu Hartoni, Yogi, Rizky Lismana, Akmal Sukri, Ahmad Syahrial Nst</p>

        </div>
      </div>
      <div class="row justify-content-around" id="row-profil">
        <div class="col-md-4" id="col-profil">
          <img src="<?= base_url('assets/img/img-005.jpg') ?>" class="img-thumbnail">
          <h4>SEKSI OLAHRAGA</h4>
          <P>Bergerak dalam bidang olahraga dibina oleh seksi Erwin, Muhammad Akbar, Andry Saputra, Vahrio Candra, Shandy Rhama Putra</P>

        </div>
        <div class="col-md-4" id="col-profil">
          <img src="<?= base_url('assets/img/img-005.jpg') ?>" class="img-thumbnail">
          <h4>SEKSI KESEHATAN</h4>
          <p></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="contact-card">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>CATEGORIES</h4>
          <a href="<?= base_url('home/artikel') ?>">EVENT</a>
        </div>
        <div class="col-lg-4">
          <h4>IKATAN PELAJAR MAHASISWA PEMUDA KEMPAS</h4>
          <p>Sekertariat IPMPK @ Kelurahan Kempas Jaya, Jl Lintas Provinsi RW 04 Kab. Indragiri Hilir</p>
          <hr class="divider my-4">
          <p>Telp. 081363019268</p>
          <p>Email: bagusshadii@gmail.com</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact -->
  <!-- Footer -->
  <section class="footer">
    <footer>
      <div class="container">
        <div class="row justify-content-center text-center text-black">
          <p>&copy; COPYRIGHT IKATAN PELAJAR MAHASISWA PEMUDA KEMPAS</p>
        </div>
      </div>
    </footer>
  </section>
  <!-- Footer -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
</body>

</html>