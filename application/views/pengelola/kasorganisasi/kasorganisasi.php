<div class="card shadow mb-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm">
                <h6 class="m-2 font-weight-bold text-primary">DATA KAS ORGANISASI</h6>
                <div class="row" id="pemasukan">
                    <div class="col-sm">
                        <p class="m-2 text-primary">Pemasukan</p>
                    </div>
                    <div class="col-sm">
                        <p class="m-2 text-primary" id="hasilpemasukan"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <h6 class="m-2 text-primary">Pengeluaran</h6>
                    </div>
                    <div class="col-sm">
                        <h6 class="m-2 text-primary" id="hasilpengeluaran"></h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm">
                        <h6 class="m-2 text-primary">Sisa Kas</h6>
                    </div>
                    <div class="col-sm">
                        <h6 class="m-2 text-primary" id="hasiljumlah"></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm text-right">
                <button class="m-2 btn btn-sm btn-primary tambahkas"><i class="fas fa-money-check-alt"></i> TAMBAH KAS
                </button>
                <button class="m-2 btn btn-sm btn-warning tarikkas"><i class="fas fa-money-bill-wave"></i> TARIK KAS
                </button>
                <div class="export" id="export"></div>
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
                        <th>Jenis</th>
                        <th>Tanggal Setor</th>
                        <th>Jumlah Setor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Kas-->
<div class="modal fade" id="formtambah" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="ForInputNama">Cari Nama</label>
                            <input type="text" class="form-control" id="inputnama">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="Id_anggota">Nama</label>
                            <select class="form-control" id="Id_anggota" name="Id_anggota">
                                <option value="">ketik nama pada form atas</option>
                            </select>
                            <small class="text-danger" id="namaError"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Setor</label>
                    <input type="date" class="form-control" id="Tanggal_setor" name="Tanggal_setor">
                    <small class="text-danger" id="tanggalError"></small>
                </div>
                <div class="form-group">
                    <label>Jumlah Setor</label>
                    <input type="text" class="form-control" id="Jumlah_setor" name="Jumlah_setor">
                    <small class="text-danger" id="jumlahError"></small>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" id="Jenis" name="Jenis" disabled>
                                <option value="pemasukan" selected>pemasukan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" id="Keterangan" name="Keterangan">
                                <option value="iuran">Iuran</option>
                                <option value="kegiatan">kegiatan</option>
                                <option value="Lain Lain">Lain Lain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Diskripsi</label>
                    <input type="text" class="form-control" id="Diskripsi" name="Diskripsi">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan Kas</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kas-->
<div class="modal fade" id="formedit" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditKas">Edit Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Id_anggota">Nama</label>
                    <input type="text" class="form-control" id="NamaEdit" disabled>
                    <input type="text" class="form-control" id="Id_KasOrganisasiEdit" hidden>
                    <input type="text" class="form-control" id="Id_anggotaEdit" hidden>
                </div>
                <div class="form-group">
                    <label>Tanggal Setor</label>
                    <input type="date" class="form-control" id="Tanggal_setorEdit" name="Tanggal_setorEdit">
                    <small class="text-danger" id="tanggalErrorEdit"></small>
                </div>
                <div class="form-group">
                    <label>Jumlah Setor</label>
                    <input type="text" class="form-control" id="Jumlah_setorEdit" name="Jumlah_setorEdit">
                    <small class="text-danger" id="jumlahErrorEdit"></small>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" id="JenisEdit" name="JenisEdit">
                                <option value="pemasukan" selected>pemasukan</option>
                                <option value="pengeluaran" selected>pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" id="KeteranganEdit" name="KeteranganEdit">
                                <option value="Iuran">Iuran</option>
                                <option value="Kegiatan">kegiatan</option>
                                <option value="Lain Lain">Lain Lain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Diskripsi</label>
                    <input type="text" class="form-control" id="DiskripsiEdit" name="DiskripsiEdit">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_edit">Edit Kas</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tarik Kas-->
<div class="modal fade" id="formtarik" tabindex="-1" aria-labelledby="TarikModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TarikLabel">Tarik Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="ForInputNamaTarik">Cari Nama</label>
                            <input type="text" class="form-control" id="inputnamaTarik">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="Id_anggotaTarik">Nama</label>
                            <select class="form-control" id="Id_anggotaTarik" name="Id_anggotaTarik[]">
                                <option value="">ketik nama pada form atas</option>
                            </select>
                            <small class="text-danger" id="namaErrorTarik"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Setor</label>
                    <input type="date" class="form-control" id="Tanggal_setorTarik" name="Tanggal_setorTarik">
                    <small class="text-danger" id="TarikTanggalErr"></small>
                </div>
                <div class="form-group">
                    <label>Jumlah Setor</label>
                    <input type="text" class="form-control" id="Jumlah_setorTarik" name="Jumlah_setorTarik">
                    <small class="text-danger" id="TarikJumlahErr"></small>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" id="JenisTarik" name="JenisTarik" disabled>
                                <option value="pengeluaran" selected>pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <select class="form-control" id="KeteranganTarik" name="KeteranganTarik">
                                <option value="iuran">Iuran</option>
                                <option value="kegiatan">kegiatan</option>
                                <option value="Lain Lain">Lain Lain</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Diskripsi</label>
                    <input type="text" class="form-control" id="DiskripsiTarik" name="DiskripsiTarik">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_tarik">Tarik Kas</button>
            </div>
        </div>
    </div>
</div>


<script>
    var table;
    var temp = null;
    $(document).ready(function() {
        /* -- get kas -- */
        getkas();
        /* -- datatable user -- */
        $(".datepicker").datepicker({
            "dateFormat": "yy-mm-dd"
        });

        var table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    title: 'Data Kas Organisasi',
                    messageTop: function() {
                        return "Pemasukan\t\t: " + $('#hasilpemasukan').text() + "\npengeluran\t\t : " + $('#hasilpengeluaran').text() + "\n Sisa Kas\t\t\t  : " + $('#hasiljumlah').text();
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'btn-success btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Kas Organisasi',
                    messageTop: function() {
                        return "Pemasukan\t\t: " + $('#hasilpemasukan').text() + "\npengeluran\t\t : " + $('#hasilpengeluaran').text() + "\n Sisa Kas\t\t\t  : " + $('#hasiljumlah').text();
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    className: 'btn-danger btn-sm',
                    footer: true
                }
            ],
            "ajax": {
                "url": "<?= base_url('pengelola/kasorganisasi/dashboard/json_kasorganisasi') ?>",
                "type": "POST",
                "dataType": "JSON",
                "data": function(data) {
                    // Read values
                    var from_date = $('#search_fromdate').val();
                    var to_date = $('#search_todate').val();
                    // Append to data
                    data.searchByFromdate = from_date;
                    data.searchByTodate = to_date;
                },
                "dataSrc": function(json) {
                    $('#hasiljumlah').html(json.totalkas);
                    $('#hasilpemasukan').html(json.totalkaspemasukan);
                    $('#hasilpengeluaran').html(json.totalkaspengeluaran);
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

        /* -- convert int to idr -- */
        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }
    });

    /* -- tambah daa kas -- */
    $(document).on('click', '.tambahkas', () => {
        $('#formtambah').modal('show');
        $('#btn_simpan').on('click', () => {
            var Id_anggota = $('#Id_anggota').val();
            var Tanggal_setor = $('#Tanggal_setor').val();
            var Jumlah_setor = $('#Jumlah_setor').val();
            var Jenis = $('#Jenis').val();
            var Keterangan = $('#Keterangan').val();
            var Diskripsi = $('#Diskripsi').val();
            $.ajax({
                url: "<?php echo base_url('pengelola/kasorganisasi/dashboard/tambah'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    Id_anggota: Id_anggota,
                    Tanggal_setor: Tanggal_setor,
                    Jumlah_setor: Jumlah_setor,
                    Jenis: Jenis,
                    Keterangan: Keterangan,
                    Diskripsi: Diskripsi
                },
                success: function(data) {
                    if (data !== 'sukses') {
                        $('#namaError').html(data.Id_anggota);
                        $('#jumlahError').html(data.Jumlah_setor);
                        $('#tanggalError').html(data.Tanggal_setor);
                    } else {
                        swal("Data Kas berhasil disimpan!", {
                            icon: "success"
                        });

                        $('.swal-button--confirm').on('click', () => {
                            $('#formtambah').modal('hide');
                            $('#dataTable').dataTable().fnDraw();
                            getkas();
                        })
                    }
                }
            });
        })
        load();
    });

    /* -- tarik data kas -- */
    $(document).on('click', '.tarikkas', () => {
        $('#formtarik').modal('show');
        load();
        $('#btn_tarik').on('click', () => {
            var Id_anggotaTarik = $('#Id_anggotaTarik').val();
            var Tanggal_setorTarik = $('#Tanggal_setorTarik').val();
            var Jumlah_setorTarik = $('#Jumlah_setorTarik').val();
            var Keterangan = $('#KeteranganTarik').val();
            var Jenis = $('#JenisTarik').val();
            var Diskripsi = $('#DiskripsiTarik').val();
            $.ajax({
                url: "<?= base_url('pengelola/kasorganisasi/dashboard/tarik'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    Id_anggotaTarik: Id_anggotaTarik,
                    Tanggal_setorTarik: Tanggal_setorTarik,
                    Jumlah_setorTarik: Jumlah_setorTarik,
                    Keterangan: Keterangan,
                    Jenis: Jenis,
                    Diskripsi: Diskripsi
                },
                success: function(data) {
                    if (data !== 'sukses') {
                        $('#namaErrorTarik').html(data.Id_anggota);
                        $('#TarikTanggalErr').html(data.Tanggal_setor);
                        $('#TarikJumlahErr').html(data.Jumlah_setor);
                    } else {
                        swal("Data Kas berhasil disimpan!", {
                            icon: "success"
                        });

                        $('.swal-button--confirm').on('click', () => {
                            $('#formtarik').modal('hide');
                            $('#dataTable').dataTable().fnDraw();
                            getkas();
                        })
                    }
                }
            });
        });
    });

    /* -- edit data kas -- */
    function edit(dataedit) {
        $('#formedit').modal('show');
        var id_KasOrganisasi = $(dataedit).attr('id_KasOrganisasi');
        getdetail(id_KasOrganisasi);
        $('#btn_edit').on('click', () => {
            var Id_anggota = $('#Id_anggotaEdit').val();
            var Id_KasOrganisasi = $('#Id_KasOrganisasiEdit').val();
            var Tanggal_setorEdit = $('#Tanggal_setorEdit').val();
            var Jumlah_setorEdit = $('#Jumlah_setorEdit').val();
            var Jenis = $('#JenisEdit').val();
            var Keterangan = $('#KeteranganEdit').val();
            var Diskripsi = $('#DiskripsiEdit').val();
            $.ajax({
                url: "<?php echo base_url('pengelola/kasorganisasi/dashboard/edit'); ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    Id_anggota: Id_anggota,
                    Id_KasOrganisasi: Id_KasOrganisasi,
                    Tanggal_setorEdit: Tanggal_setorEdit,
                    Jumlah_setorEdit: Jumlah_setorEdit,
                    Jenis: Jenis,
                    Keterangan: Keterangan,
                    Diskripsi: Diskripsi
                },
                success: function(data) {
                    if (data.keterangan == 'sukses') {
                        swal("Data Kas berhasil disimpan!", {
                            icon: "success"
                        });

                        $('.swal-button--confirm').on('click', () => {
                            $('#formedit').modal('hide');
                            $('#dataTable').dataTable().fnDraw();
                            getkas();
                        })
                    } else {
                        $('#jumlahErrorEdit').html(data.data['Jumlah_setor']);
                        $('#tanggalErrorEdit').html(data.data['Tanggal_setor']);
                    }
                }
            });
        });
    }

    /* -- delete data kas -- */
    function hapus(datadelete) {
        var Id_KasOrganisasi = $(datadelete).attr('Id_KasOrganisasi');
        $.ajax({
            url: "<?= base_url('pengelola/kasorganisasi/dashboard/hapus/') ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                Id_KasOrganisasi: Id_KasOrganisasi
            },
            success: function(data) {
                console.log(data);
                if (data == "sukses") {
                    swal("Data Kas berhasil dihapus!", {
                        icon: "success"
                    });

                    $('.swal-button--confirm').on('click', () => {
                        $('#dataTable').dataTable().fnDraw();
                        getkas();
                    })
                } else {
                    alert('Gagal Hapus');
                    $('#dataTable').dataTable().fnDraw();
                }
            }
        });
    }

    /* -- get detail kas organisasi untuk edit -- */
    function getdetail(id_KasOrganisasi) {
        $.ajax({
            url: "<?= base_url('pengelola/kasorganisasi/dashboard/getbyid/'); ?>" + id_KasOrganisasi,
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#NamaEdit').val(data.Nama);
                $('#Id_KasOrganisasiEdit').val(data.id_KasOrganisasi);
                $('#Id_anggotaEdit').val(data.Id_anggota);
                $('#Tanggal_setorEdit').val(data.Tanggal_setor);
                $('#Jumlah_setorEdit').val(data.Jumlah_setor);
                $('#JenisEdit').val(data.Jenis);
                $('#KeteranganEdit').val(data.Keterangan);
                $('#DiskripsiEdit').val(data.Diskripsi);
            }
        });

    }

    /* -- get nama users anggota by search -- */
    function load() {
        $('#inputnama').keyup(function() {
            var search = $(this).val();
            console.log(search)
            if (search != '') {
                $.ajax({
                    url: "<?php echo site_url('pengelola/dashboard/getuserjson'); ?>",
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
        });
        $('#inputnamaTarik').keyup(function() {
            var search = $(this).val();
            console.log(search)
            if (search != '') {
                $.ajax({
                    url: "<?php echo site_url('pengelola/dashboard/getuserjson'); ?>",
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
                        $('#Id_anggotaTarik').html(html);
                    }
                })
            }
        });
    }

    /* -- get data perhitungan kas organisasi -- */
    function getkas() {
        $.ajax({
            url: "<?= base_url('pengelola/kasorganisasi/dashboard/getrekapkas') ?>",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                console.log()
                /* $('#hasiljumlah').html(data.hasiljumlah); */
            }
        });
    }
</script>