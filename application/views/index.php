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
    <section>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a href="<?= base_url('/home') ?>" class="navbar-brand text-white">
                    IPMPK
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ml-auto my-lg-0 my-2">
                        <li class="nav-item">
                            <a href="<?= base_url('home/profile')?>" class="nav-link">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('home/artikel') ?>" class="nav-link">Berita & Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-target="#exampleModal" data-toggle="modal" class="nav-link btn-sm btn-primary" style="padding-left:15px; padding-right:15px;">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- Home -->
    <section class="home" id="home">
        <div class="container">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <section class="isi-home">
                    <div class="col-lg-12">
                        <img src="<?= base_url('assets/img/ipmpk.png') ?>" alt="" class="logo-home" height="200" width="200">
                        <hr class="divider my-4" />
                        <h1 class="text-uppercase text-white">IKATAN PELAJAR MAHASISWA PEMUDA KEMPAS</h1>
                        <h2 class="text-uppercase text-white">(IPMPK)</h2>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- End Home -->
    <!-- About -->
    <section class="about-first">
        <div class="container h-50">
            <div class="row h-100 align-items-center justify-content-left text-left">
                <div class="col-lg-6">
                    <h1 class="display-1 text-white">IPMPK</h1>
                    <p class="text-white text-justify">Organisasi Pelajar Mahasiswa Pemuda Kempas berdiri pada tahun 2017. IPMPK dipelopori dan didirikan oleh Taqrir M. Asri Saman juga sebagai ketua umum organisasi. Organisasi ditujukan untuk membentuk karakter, komunikasi dan solidaritas antar pemuda, mahasiswa, pelajar kempas supaya menjadi lebih baik.</p>
                    <a href="<?= base_url('home/profile')?>"><button class="btn btn-success">Tentang Kami</button></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-wrap-home">
                        <div class="login-html-home">
                            <div class="login-anggota">
                                <a href="<?= base_url('login/loginanggota')?>" class="btn btn btn-primary">Login Anggota</a>
                            </div>
                            <div class="login-donatur">
                                <a href="<?= base_url('login/logindonatur')?>" class="btn btn btn-primary">Login Donatur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PORTFOLIO -->
        <section class="portfolio">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/img/bgs.jpg') ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/sawah.jpg') ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/img-003.jpg') ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
</body>

</html>