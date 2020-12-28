<!-- DataTales Example -->
<div class="card shadow mb-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm">
                <h6 class="m-2 font-weight-bold text-primary">DATA KAS QURBAN</h6>
            </div>
            <div class="col-sm text-right">
                <button class="m-1 btn btn-sm btn-primary total"><i class="m-1 fas fa-money-check-alt"></i>
                </button>
                <button class="m-1 btn btn-sm btn-primary" id="tambah_data"><i class="m-1 fas fa-plus-square"></i></i> Tambah Data Kas
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <input type='text' id='search_fromdate' class="datepicker form-control mt-1" placeholder='dari tanggal' style="width: 150px;">
                <input type='text' id='search_todate' class="datepicker form-control mt-1" placeholder='sampai tanggal' style="width: 150px;">
                <input type='button' id="btn_search" class="btn btn-sm btn-primary mt-1" value="filter">
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Mulai Setor</th>
                        <th>Batas Setor</th>
                        <th>Total Setor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- modal tambah kas -->
<div class="modal fade" id="formtambah" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kas Kurban</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-tambah">
                <div class="form-group">
                    <ul class="nav nav-pills mb-1 text-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pilih : </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-anggota-tab" data-toggle="pill" href="#pills-anggota" role="tab" aria-controls="pills-anggota" aria-selected="true">Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-donatur-tab" data-toggle="pill" href="#pills-donatur" role="tab" aria-controls="pills-donatur" aria-selected="false">Donatur</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-anggota" role="tabpanel" aria-labelledby="pills-anggota-tab" hidden>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="forId">Cari Nama Anggota</label>
                                            <input type="text" class="form-control" id="inputnamaanggota" name="inputnamaanggota">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="forId">List Anggota</label>
                                            <select class="form-control" id="Id_anggota" name="Id_anggota">
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="tambahduluanggota">
                                    <a href="<?= base_url('/user/anggota') ?>" class="btn btn-sm btn-warning " style="width: 100%;">Tambah Anggota</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-donatur" role="tabpanel" aria-labelledby="pills-donatur-tab" hidden>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="forId">Cari Nama Donatur</label>
                                            <input type="text" class="form-control" id="inputnamadonatur" name="inputnamadonatur">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="forId">List Donatur</label>
                                            <select class="form-control" id="Id_donatur" name="Id_donatur">
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="tambahduludonatur">
                                    <a href="<?= base_url('/user/donatur') ?>" class="btn btn-sm btn-warning" style="width: 100%;">Tambah Donatur</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ForStatus">Status</label>
                    <select class="form-control" id="Status" name="Status">
                        <option value="Proses Iuran">Proses Iuran</option>
                        <option value="Proses Pembelian">Proses Pembelian</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputTanggalMulai" id="Tanggal_mulaiInput">Mulai Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal_mulai" name="Tanggal_mulai">
                </div>
                <div class="form-group">
                    <label for="InputTanggalMulai" id="Tanggal_akhirInput">Batas Akhir</label>
                    <input type="date" class="form-control" id="Tanggal_akhir" name="Tanggal_akhir">
                </div>
                <div class="form-group">
                    <label for="InputTanggalMulai" id="Setor">Setoran Awal</label>
                    <input type="text" class="form-control" id="Total_setor" name="Total_setor">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit kas -->
<div class="modal fade" id="formedit" tabindex="-1" aria-labelledby="EditModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kas Kurban</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-edit">
                <div class="form-group">
                    <input type="text" class="form-control" id="Id_kaskurbanEdit" name="Id_kaskurbanEdit" hidden>
                    <input type="text" class="form-control" id="Id_anggotaEdit" name="Id_anggotaEdit" hidden>
                    <input type="text" class="form-control" id="Id_donaturEdit" name="Id_donaturEdit" hidden>
                    <input type="text" class="form-control" id="Total_setorEdit" name="Total_setorEdit" hidden>
                </div>
                <div class="form-group">
                    <label for="ForStatus">Status</label>
                    <select class="form-control" id="StatusEdit" name="StatusEdit">
                        <option value="Proses Iuran">Proses Iuran</option>
                        <option value="Proses Pembelian">Proses Pembelian</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputTanggalMulai" id="Tanggal_mulaiInput">Mulai Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal_mulaiEdit" name="Tanggal_mulaiEdit">
                </div>
                <div class="form-group">
                    <label for="InputTanggalMulai" id="Tanggal_akhirInput">Batas Akhir</label>
                    <input type="date" class="form-control" id="Tanggal_akhirEdit" name="Tanggal_akhirEdit">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_edit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    /* Tampil Data Kas Kurban */
    $(document).ready(function() {
        $(".datepicker").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $tabel = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    title: 'Data Kas Kurban',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    className: 'btn-success btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Kas Kurban',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    className: 'btn-danger btn-sm',
                    footer: true
                }
            ],
            "ajax": {
                "url": "<?= base_url('pengelola/kaskurban/dashboard/json_kaskurban') ?>",
                "type": "POST",
                "data": function(data) {
                    // Read values
                    var from_date = $('#search_fromdate').val();
                    var to_date = $('#search_todate').val();
                    // Append to data
                    data.searchByFromdate = from_date;
                    data.searchByTodate = to_date;
                    console.log(data.searchByFromdate);
                },
                "dataSrc": function(json){
                    $('.total').html(json.totalkaskurban);
                    console.log(json);
                    return json.data;
                },
            }
        });

        $('#btn_search').click(function() {
            $('#dataTable').dataTable().fnDraw();
        });

        /* -- reset modal -- */
        $(".modal").on("hidden.bs.modal", function() {
            $(this).removeData();
        });

        getTotalSetor();
        $(".modal").on("hidden.bs.modal", function(e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("#Status")
                .html('<option value="Proses Iuran">Proses Iuran</option><option value="Proses Pembelian">Proses Pembelian</option><option value="Selesai">Selesai</option>')
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            var html;
            html += '<option value="-">-</option>';
            $('#Id_donatur').html(html);
            $('#Id_anggota').html(html);
        });
    });

    function getTotalSetor() {
        $.ajax({
            url: "<?= base_url('pengelola/kaskurban/dashboard/getTotalSetor'); ?>",
            dataType: "JSON",
            success: function(data) {
                $('.total').html(data.totalkas);
            }
        });
    };

    /* tampil modal tambah */
    $('#tambah_data').on('click', () => {
        $('#formtambah').modal('show');
        $('#pills-home-tab').on('click', () => {
            document.getElementById('pills-anggota').hidden = true;
            document.getElementById('pills-donatur').hidden = true;
            $('#Id_anggota').html(html);
        })
        $('#pills-anggota-tab').on('click', function(e) {
            document.getElementById('pills-anggota').hidden = false;
            document.getElementById('pills-donatur').hidden = true;
            simpankas();
            loadanggota();
            var html;
            html += '<option value="-">-</option>';
            $('#Id_donatur').html(html);
        });
        $('#pills-donatur-tab').on('click', () => {
            document.getElementById('pills-donatur').hidden = false;
            document.getElementById('pills-anggota').hidden = true;
            simpankas();
            loaddonatur();
            var html;
            html += '<option value="-">-</option>';
            $('#Id_anggota').html(html);
        })
    });

    /* tambah data kas kurban */
    function simpankas() {
        $('#btn_simpan').on('click', () => {
            var Id_anggota = $('#Id_anggota').val();
            var Id_donatur = $('#Id_donatur').val();
            var Status = $('#Status').val();
            var Tanggal_mulai = $('#Tanggal_mulai').val();
            var Tanggal_akhir = $('#Tanggal_akhir').val();
            var Total_setor = $('#Total_setor').val();
            if (Id_anggota == '-') {
                Id_anggota = 'NULL';
            } else if (Id_donatur == '-') {
                Id_donatur = 'NULL';
            }
            swal({
                    title: "Apakah anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willInsert) => {
                    if (willInsert) {
                        $.ajax({
                            url: "<?php echo base_url('pengelola/kaskurban/dashboard/tambah'); ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_anggota: Id_anggota,
                                Id_donatur: Id_donatur,
                                Status: Status,
                                Tanggal_mulai: Tanggal_mulai,
                                Tanggal_akhir: Tanggal_akhir,
                                Total_setor: Total_setor
                            },
                            success: function(data) {
                                swal("Kas Berhasil ditambah!", {
                                    icon: "success"
                                });
                                $('.swal-button--confirm').on('click', () => {
                                    $('#formtambah').modal('hide');
                                    $('#dataTable').dataTable().fnDraw();
                                    getTotalSetor();
                                })
                            },
                            error: function(data) {
                                console.log(data)
                            }
                        });
                    } else {
                        swal("Ok!");
                    }
                })
        })
    }

    /* edit data kas kurban */
    function edit(dataedit) {
        var Id_kaskurban = $(dataedit).attr('Id_kaskurban');
        $('#formedit').modal('show');
        getkasbyid(Id_kaskurban);
        $('#btn_edit').on('click', () => {
            var Id_kaskurban = $('#Id_kaskurbanEdit').val();
            var Id_anggota = $('#Id_anggotaEdit').val();
            var Id_donatur = $('#Id_donaturEdit').val();
            var Status = $('#StatusEdit').val();
            var Tanggal_mulai = $('#Tanggal_mulaiEdit').val();
            var Tanggal_akhir = $('#Tanggal_akhirEdit').val();
            var Total_setor = $('#Total_setorEdit').val();
            if (Id_anggota == '') {
                Id_anggota = 'NULL';
            } else if (Id_donatur == '') {
                Id_donatur = 'NULL';
            }
            swal({
                    title: "Apakah anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willInsert) => {
                    if (willInsert) {
                        $.ajax({
                            url: "<?= base_url('pengelola/kaskurban/dashboard/edit/') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_kaskurban: Id_kaskurban,
                                Id_anggota: Id_anggota,
                                Id_donatur: Id_donatur,
                                Status: Status,
                                Tanggal_mulai: Tanggal_mulai,
                                Tanggal_akhir: Tanggal_akhir,
                                Total_setor: Total_setor
                            },
                            success: function(data) {
                                swal("Kas Berhasil diUbah!", {
                                    icon: "success"
                                });
                                $('.swal-button--confirm').on('click', () => {
                                    $('#formedit').modal('hide');
                                    $('#dataTable').dataTable().fnDraw();
                                    getTotalSetor();
                                })
                            }
                        });
                    } else {
                        swal("Ok!");
                    }
                })
        });
    }

    /* get data edit */
    function getkasbyid(Id_kaskurban) {
        $.ajax({
            url: "<?= base_url('pengelola/kaskurban/dashboard/getkasbyid/'); ?>" + Id_kaskurban,
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#Id_kaskurbanEdit').val(data.Id_kaskurban);
                $('#Id_anggotaEdit').val(data.Id_anggota);
                $('#Id_donaturEdit').val(data.Id_donatur);
                $('#Total_setorEdit').val(data.Total_setor);
                $('#StatusEdit').val(data.Status);
                $('#Tanggal_mulaiEdit').val(data.Tanggal_mulai);
                $('#Tanggal_akhirEdit').val(data.Tanggal_akhir);
                console.log(data);
            }
        });
    }

    /* hapus data kas kurban */
    function hapus(datahapus) {
        var Id_kaskurban = $(datahapus).attr('id_kaskurban');
        swal({
                title: "Apakah anda Yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willInsert) => {
                if (willInsert) {
                    $.ajax({
                        url: "<?= base_url('pengelola/kaskurban/dashboard/hapus/') ?>" + Id_kaskurban,
                        method: "POST",
                        success: function(data) {
                            swal("Kas Berhasil dihapus!", {
                                icon: "success"
                            });
                            $('.swal-button--confirm').on('click', () => {
                                $('#dataTable').dataTable().fnDraw();
                                getTotalSetor();
                            })
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    });
                } else {
                    swal("Ok!");
                }
            })
    }

    /* Load Data User Anggota */
    function loadanggota() {
        $('#inputnamaanggota').keyup(function() {
            var search = $(this).val();
            if (search) {
                $.ajax({
                    url: "<?php echo site_url('pengelola/kaskurban/dashboard/getuserjson/'); ?>" + 'anggota',
                    method: "POST",
                    async: true,
                    data: {
                        query: search
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].Id_anggota + '>' + data[i].Nama + '</option>';
                        }
                        $('#Id_anggota').html(html);
                    }
                })
            }
        })
    }

    /* Load Data User Donatur */
    function loaddonatur() {
        $('#inputnamadonatur').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: "<?php echo site_url('pengelola/kaskurban/dashboard/getuserJson/'); ?>" + 'donatur',
                    method: "POST",
                    async: true,
                    data: {
                        query: search
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].Id_donatur + '>' + data[i].Nama + '</option>';
                        }
                        $('#Id_donatur').html(html);
                    }
                })
            }
        })
    }
</script>