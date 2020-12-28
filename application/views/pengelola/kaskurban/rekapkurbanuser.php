<div class="card shadow mb-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm">
                <h6 class="m-2 font-weight-bold text-primary">DATA IURAN QURBAN</h6>
                <h4 class="m-2 font-weight-bold text-primary text-uppercase" id="NamaDetail"></h4>
                <p class="m-2 font-weight-bold text-primary" id="Total_setorDetail"></p>
            </div>
            <div class="col-sm text-right">
                <button class="m-1 btn btn-sm btn-primary" name="tambah_iuran" id="tambah_iuran"><i class="m-1 fas fa-money-check-alt"></i> Tambah Iuran
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
<!-- modal tambah kas -->
<div class="modal fade" id="formtambah" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="Id_kaskurban" name="Id_kaskurban" hidden>
                </div>
                <div class="form-group">
                    <label for="InputTanggal">Tanggal Setor</label>
                    <input type="date" class="form-control" id="Tanggal_setor" name="Tanggal_setor">
                </div>
                <div class="form-group">
                    <label for="InputJumlah" id="Setor">Jumlah</label>
                    <input type="text" class="form-control" id="Jumlah_setor" name="Jumlah_setor">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="Id_iuranEdit" name="Id_iuranEdit" hidden>
                    <input type="text" class="form-control" id="Id_kaskurbanEdit" name="Id_kaskurbanEdit" hidden>
                </div>
                <div class="form-group">
                    <label for="InputTanggal">Tanggal Setor</label>
                    <input type="date" class="form-control" id="Tanggal_setorEdit" name="Tanggal_setorEdit">
                </div>
                <div class="form-group">
                    <label for="InputJumlah" id="Setor">Jumlah</label>
                    <input type="text" class="form-control" id="Jumlah_setorEdit" name="Jumlah_setorEdit">
                    <input type="text" class="form-control" id="Jumlah_setorAwal" name="Jumlah_setorAwal" hidden>
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
        getdetailuser();
        $(".datepicker").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $tabel = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('pengelola/kaskurban/rekapkurban/json_kaskurbanbyid/') . $this->uri->segment(5) ?>",
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
                "dataSrc":function(json){
                    $('#Total_setorDetail').html(json.totalkas);
                    return json.data;
                }
            },
            "columns": [{
                    "width": "5%",
                },
                null,
                null,
                {
                    className: 'text-center'
                }
            ],
            columnDefs: [{
                type: 'date-dd-mmm-yyyy',
                targets: 1
            }],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    title: 'Rekap Data Kas Kurban',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function() {
                        return "Nama\t\t: " + $('#NamaDetail').text() + "\n Total Kas\t\t\t  : " + $('#Total_setorDetail').text();
                    },
                    className: 'btn-success btn-sm',
                    footer: true
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Rekap Data Kas Kurban',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function() {
                        return "Nama\t\t\t\t\t: " + $('#NamaDetail').text() + "\n Total Kas\t\t\t  : " + $('#Total_setorDetail').text();
                    },
                    className: 'btn-danger btn-sm',
                    footer: true
                }
            ],
        });

        $('#btn_search').click(function() {
            $('#dataTable').dataTable().fnDraw();
        });

        /* -- reset modal -- */
        $(".modal").on("hidden.bs.modal", function() {
            $(this).removeData();
        });
    });

    function getdetailuser() {
        $.ajax({
            url: "<?= base_url('pengelola/kaskurban/rekapkurban/getdetailuser/') . $this->uri->segment(5); ?>",
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data.Nama_donatur != null) {
                    $('#NamaDetail').html(data.Nama_donatur);
                } else {
                    $('#NamaDetail').html(data.Nama_anggota);
                }
                $('#Total_setorDetail').html(data.Total_setor);
            }
        });
    }

    $('#tambah_iuran').on('click', () => {
        $('#formtambah').modal('show');
        $('#btn_simpan').on('click', () => {
            var Id_kaskurban = "<?= $this->uri->segment(4); ?>";
            var Tanggal_setor = $('#Tanggal_setor').val();
            var Jumlah_setor = $('#Jumlah_setor').val();
            swal({
                    title: "Apakah anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willInsert) => {
                    if (willInsert) {
                        $.ajax({
                            url: "<?= base_url('pengelola/kaskurban/rekapkurban/tambah') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_kaskurban: Id_kaskurban,
                                Tanggal_setor: Tanggal_setor,
                                Jumlah_setor: Jumlah_setor
                            },
                            success: function(data) {
                                swal("Iuran Berhasil diUbah!", {
                                    icon: "success"
                                });
                                $('.swal-button--confirm').on('click', () => {
                                    $('#formtambah').modal('hide');
                                    $('#dataTable').dataTable().fnDraw();
                                    getdetailuser();
                                })
                            }
                        });
                    } else {
                        swal("Ok!");
                    }
                })
        });
    });

    function edit(dataedit) {
        var Id_iuran = $(dataedit).attr('id_iuran');
        console.log(Id_iuran);
        $('#formedit').modal('show');
        getedit(Id_iuran);
        $('#btn_edit').on('click', () => {
            var Id_kaskurban = $('#Id_kaskurbanEdit').val();
            var Tanggal_setor = $('#Tanggal_setorEdit').val();
            var Jumlah_setor = $('#Jumlah_setorEdit').val();
            var Jumlah_setorAwal = $('#Jumlah_setorAwal').val();
            swal({
                    title: "Apakah anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willEdit) => {
                    if (willEdit) {
                        $.ajax({
                            url: "<?= base_url('pengelola/kaskurban/rekapkurban/edit') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_iuran: Id_iuran,
                                Id_kaskurban: Id_kaskurban,
                                Tanggal_setor: Tanggal_setor,
                                Jumlah_setor: Jumlah_setor,
                                Jumlah_setorAwal: Jumlah_setorAwal
                            },
                            success: function(data) {
                                swal("Data Iuran Berhasil diEdit!", {
                                    icon: "success"
                                });
                                $('.swal-button--confirm').on('click', () => {
                                    $('#formedit').modal('hide');
                                    $('#dataTable').dataTable().fnDraw();
                                    getdetailuser();
                                })
                            }
                        });
                    } else {
                        swal("Ok!");
                    }
                })
        });
    }
    /* get detail iuran for edit */
    function getedit(Id_iuran) {
        $.ajax({
            url: "<?= base_url('pengelola/kaskurban/rekapkurban/getedit/') ?>" + Id_iuran,
            dataType: "JSON",
            method: "GET",
            success: function(data) {
                $('#Id_kaskurbanEdit').val(data.Id_kaskurban);
                $('#Id_iuranEdit').val(data.Id_iuran);
                $('#Tanggal_setorEdit').val(data.Tanggal_setor);
                $('#Jumlah_setorAwal').val(data.Jumlah_setor);
                $('#Jumlah_setorEdit').val(data.Jumlah_setor);
            }
        });
    }

    function hapus(datahapus) {
        var Id_iuran = $(datahapus).attr('id_iuran');
        var Jumlah_setor = $(datahapus).attr('Jumlah_setor');
        swal({
                title: "Apakah anda Yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?= base_url('pengelola/kaskurban/rekapkurban/hapus') ?>",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            Id_iuran: Id_iuran,
                            Jumlah_setor: Jumlah_setor,
                            Id_kaskurban: "<?= $this->uri->segment(4); ?>"
                        },
                        success: function(data) {
                            swal("Data Iuran Berhasil dihapus!", {
                                icon: "success"
                            });
                            $('.swal-button--confirm').on('click', () => {
                                $('#dataTable').dataTable().fnDraw();
                                getdetailuser();
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
</script>