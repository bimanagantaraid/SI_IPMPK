<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custome.css') ?>" rel="stylesheet">
    <title><?= $title->post_judul ?></title>
</head>

<body class="bg-primary">
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('vendor/ckeditor/ckeditor.js'); ?>"></script>
    <div class="container-fluid">
        <?= $contents ?>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('vendor/DataTables-1.10.22/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('vendor/DataTables-1.10.22/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('vendor/JSZip-2.5.0/jszip.min.js') ?>"></script>
    <script src="<?= base_url('pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('pdfmake/build/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('vendor/Buttons-1.6.5/js/buttons.colVis.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('node_modules/sweetalert/dist/sweetalert.min.js') ?>"></script>
</body>

</html>