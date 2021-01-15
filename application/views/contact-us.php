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
  <!-- NAVBAR -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light text-white py-3" id="mainNav">
    <div class="container">
      <a href="<?= base_url('home') ?>" class="navbar-brand js-scroll-trigger text-white">
        IPMPK
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto my-lg-0 my-2">
          <li class="nav-item">
            <a href="<?= base_url('home/profile') ?>" class="nav-link">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/artikel') ?>" class="nav-link">Berita & Event</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/contact') ?>" class="nav-link">CONTACT US</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="header-contact">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-12 align-self-end">
          <h1 class="display-4 text-white align-middle text-center">CONTACT</h1>
          <hr class="divider my-4">
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" placeholder="Youre Name" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Youre Email" class="form-control">
            </div>
            <div class="form-group">
              <label for="telpon">Phone Number</label>
              <input type="tel" id="telpon" class="form-control" placeholder="Phone Number">
            </div>
            <select class="form-control">
              <option>---choose category---</option>
              <option>Web Design</option>
              <option value="">Web Developer</option>
            </select>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea rows="10" class="form-control"></textarea>
            </div>
            <button type="button" class="btn btn-primary">SUBMIT</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact -->

  <section class="contact-card">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>CATEGORIES</h4>
          <a href="news-event.html">EVENT</a>
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