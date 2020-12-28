<div class="card shadow mb-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm">
                <h6 class="m-2 font-weight-bold text-primary">DATA ANGGOTA ORGANISASI</h6>
            </div>
            <div class="col-sm text-right">
                <button class="m-2 btn btn-sm btn-primary" id="tambahuser"><i class="fas fa-plus-square mr-2"></i>Tambah Data User</button>
                <a href="<?= base_url('pengelola/user/anggota/export/');?>" class="m-2 btn btn-sm btn-success" id="exportexcel"><i class="fas fa-file-excel m-1"></i> Export Excel</a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>NO HP</th>
                        <th>Alamat Rumah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Users -->
<div class="modal fade" id="formtambah" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="Nama" name="Nama">
                    <small id="Nama_error" class="text-danger"></small>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="Username" name="Username">
                            <small id="Username_error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="Password" name="Password">
                            <small id="Password_error" class="text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>jabatan</label>
                            <select class="form-control" id="Jabatan" name="Jabatan">
                                <option value="Anggota">Anggota</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Sekertaris">Sekertaris</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="Status" name="Status">
                                <option value="Pemuda">Pemuda</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl" name="ttl">
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="Jenis_kelamin" name="Jenis_kelamin">
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" id="Agama" name="Agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" id="Alamat_rumah" name="Alamat_rumah">
                </div>
                <div class="form-group">
                    <label>Alamat Kost</label>
                    <input type="text" class="form-control" id="Alamat_kost" name="Alamat_kost">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" id="No_HP" name="No_HP">
                </div>
                <div class="form-group">
                    <label>Hobi</label>
                    <input type="text" class="form-control" id="Hobi" name="Hobi">
                </div>
                <label>Sosial Media</label>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-facebook"></i></label>
                            <input type="text" class="form-control form-control-sm" id="facebook" name="facebook">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-instagram"></i></label>
                            <input type="text" class="form-control form-control-sm" id="instagram" name="instagram">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-twitter"></i></label>
                            <input type="text" class="form-control form-control-sm" id="twitter" name="twitter">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_simpan">Tambah Anggota</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Users -->
<div class="modal fade" id="formedit" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-title">Edit Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="NamaEdit" name="NamaEdit">
                    <input type="text" class="form-control" id="RoleEdit" name="RoleEdit" hidden>
                    <input type="text" class="form-control" id="IdEdit" name="IdEdit" hidden>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="UsernameEdit" name="UsernameEdit">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="PasswordEdit" name="PasswordEdit">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>jabatan</label>
                            <select class="form-control" id="JabatanEdit" name="JabatanEdit">
                                <option value="Anggota">Anggota</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Sekertaris">Sekertaris</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="StatusEdit" name="StatusEdit">
                                <option value="Pemuda">Pemuda</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="Jenis_kelaminEdit" name="Jenis_kelaminEdit">
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" id="AgamaEdit" name="AgamaEdit" disabled>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttlEdit" name="ttlEdit">
                </div>
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" id="Alamat_rumahEdit" name="Alamat_rumahEdit">
                </div>
                <div class="form-group">
                    <label>Alamat Kost</label>
                    <input type="text" class="form-control" id="Alamat_kostEdit" name="Alamat_kostEdit">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" id="No_HPEdit" name="No_HPEdit">
                </div>
                <div class="form-group">
                    <label>Hobi</label>
                    <input type="text" class="form-control" id="HobiEdit" name="HobiEdit">
                </div>
                <label>Sosial Media</label>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-facebook"></i></label>
                            <input type="text" class="form-control form-control-sm" id="facebookEdit" name="facebookEdit">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-instagram"></i></label>
                            <input type="text" class="form-control form-control-sm" id="instagramEdit" name="instagramEdit">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label><i class="fab fa-twitter"></i></label>
                            <input type="text" class="form-control form-control-sm" id="twitterEdit" name="twitterEdit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_edit">Edit Anggota</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        refershTable();

        /* -- datatable users -- */
        function refershTable() {
            $('#dataTableUser').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= base_url('pengelola/user/anggota/json_anggota') ?>",
                    "type": "POST"
                },
                "columns": [{
                        "width": "5%"
                    },
                    {
                        "width": "20%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "10%"
                    },
                    null,
                    {
                        "width": "15%"
                    }
                ]
            });
        }

        /* -- reset modal -- */
        $(".modal").on("hidden.bs.modal", function() {
            $(this).removeData();
        });
    });

    /* -- tambah user anggota -- */
    $(document).on('click', '#tambahuser', () => {
        $('#formtambah').modal('show');
        $('#btn_simpan').on('click', () => {
            var Nama = $('#Nama').val();
            var Username = $('#Username').val();
            var Password = $('#Password').val();
            var Jabatan = $('#Jabatan').val();
            var ttl = $('#ttl').val();
            var Jenis_kelamin = $('#Jenis_kelamin').val();
            var Agama = $('#Agama').val();
            var Status = $('#Status').val();
            var Alamat_rumah = $('#Alamat_rumah').val();
            var Alamat_kost = $('#Alamat_kost').val();
            var Hobi = $('#Hobi').val();
            var No_HP = $('#No_HP').val();
            var Medsos = $('#instagram').val() + ',' + $('#facebook').val() + ',' + $('#twitter').val();

            $.ajax({
                url: "<?= base_url('pengelola/user/anggota/tambah') ?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    Nama: Nama,
                    Username: Username,
                    Password: Password,
                    Jabatan: Jabatan,
                    ttl: ttl,
                    Jenis_kelamin: Jenis_kelamin,
                    Agama: Agama,
                    Status: Status,
                    Alamat_rumah: Alamat_rumah,
                    Alamat_kost: Alamat_kost,
                    Hobi: Hobi,
                    No_HP: No_HP,
                    Medsos: Medsos
                },
                success: function(data) {
                    if (data !== 'sukses') {
                        $('#Nama_error').html(data.Nama);
                        $('#Username_error').html(data.Username);
                        $('#Password_error').html(data.Password);
                        $('#Jabatan_error').html(data.Jabatan);
                    } else {
                        swal("Tambah Data User Berhasil!", {
                            icon: "success"
                        });

                        $('.swal-button--confirm').on('click', () => {
                            $('#formtambah').modal('hide');
                            location.reload();
                        })
                    }
                }
            });
        });
    });


    /* -- edit data user -- */
    function edit(dataedit) {
        var Id = $(dataedit).attr('Id');
        $('#edit-title').html('Edit Anggota');
        const forminput = document.querySelectorAll('#formedit input, #formedit select');
        forminput.forEach((e) => {
            e.disabled = false;
        })
        $('#formedit').modal('show');
        $('#btn_edit').html = "EDIT ANGGOTA";
        const btn_edit = document.querySelector('#btn_edit');
        btn_edit.style.visibility = "visible";
        getdetail(Id);
        $('#btn_edit').on('click', () => {
            /* get value input */
            var Id = $('#IdEdit').val();
            var Role = $('#RoleEdit').val();
            var Username = $('#UsernameEdit').val();
            var Password = $('#PasswordEdit').val();
            var Nama = $('#NamaEdit').val();
            var ttl = $('#ttlEdit').val();
            var Agama = $('#AgamaEdit').val();
            var Alamat_kost = $('#Alamat_kostEdit').val();
            var Alamat_rumah = $('#Alamat_rumahEdit').val();
            var Jenis_kelamin = $('#Jenis_kelaminEdit').val();
            var Hobi = $('#HobiEdit').val();
            var Jabatan = $('#JabatanEdit').val();
            var No_HP = $('#No_HPEdit').val();
            var Status = $('#StatusEdit').val();
            var Medsos = $('#instagramEdit').val() + ',' + $('#facebookEdit').val() + ',' + $('#twitterEdit').val();
            swal({
                    title: "Anda yakin mau merubah?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        $.ajax({
                            url: "<?= base_url('pengelola/user/anggota/edit') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_anggota: Id,
                                Role: Role,
                                Nama: Nama,
                                Username: Username,
                                Password: Password,
                                Jabatan: Jabatan,
                                ttl: ttl,
                                Jenis_kelamin: Jenis_kelamin,
                                Agama: Agama,
                                Status: Status,
                                Alamat_rumah: Alamat_rumah,
                                Alamat_kost: Alamat_kost,
                                Hobi: Hobi,
                                No_HP: No_HP,
                                Medsos: Medsos
                            },
                            success: function(data) {
                                swal("Edit Data User Berhasil!", {
                                    icon: "success"
                                });

                                $('.swal-button--confirm').on('click', () => {
                                    $('#formedit').modal('hide');
                                    $('#dataTable').dataTable().fnDraw();
                                })
                            }
                        });
                    } else {
                        swal("Data anda aman!");
                    }
                });
        });
    };

    /* -- get detail data user -- */
    function getdetail(Id) {
        $.ajax({
            url: "<?= base_url('pengelola/user/anggota/json_getdetail/') ?>" + Id,
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#IdEdit').val(data.Id_anggota);
                $('#RoleEdit').val(data.Role);
                $('#UsernameEdit').val(data.Username);
                $('#PasswordEdit').val(data.Password);
                $('#NamaEdit').val(data.Nama);
                $('#ttlEdit').val(data.ttl);
                $('#AgamaEdit').val(data.Agama);
                $('#Alamat_kostEdit').val(data.Alamat_kost);
                $('#Alamat_rumahEdit').val(data.Alamat_rumah);
                $('#Jenis_kelaminEdit').val(data.Jenis_kelamin);
                $('#HobiEdit').val(data.Hobi);
                $('#JabatanEdit').val(data.Jabatan);
                $('#No_HPEdit').val(data.No_HP);
                $('#StatusEdit').val(data.Status);
                var mediasosial = data.Medsos;
                var explodemedsos = mediasosial.split(",");
                $('#facebookEdit').val(explodemedsos[0]);
                $('#instagramEdit').val(explodemedsos[1]);
                $('#twitterEdit').val(explodemedsos[2]);
            }
        });
    };

    /* -- get info detail user -- */
    function info(datainfo) {
        var Id = $(datainfo).attr('Id');
        $('#formedit').modal('show');
        $('#edit-title').html('info anggota');
        const btn_edit = document.querySelector('#btn_edit');
        btn_edit.style.visibility = "hidden";
        getdetail(Id);
        const forminput = document.querySelectorAll('#formedit input, #formedit select');
        forminput.forEach((e) => {
            e.disabled = true;
        })
    }

    /* -- hapus data user -- */
    function hapus(datadelete) {
        var Id = $(datadelete).attr('Id');
        swal({
                title: "Anda yakin mau hapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo site_url('pengelola/user/anggota/hapus/'); ?>" + Id,
                        method: "POST",
                        success: function(data) {
                            swal("Data berhasil dihapus!", {
                                icon: "success",
                            });
                            $('.swal-button--confirm').on('click', () => {
                                location.reload();
                            })
                        }
                    });
                } else {
                    swal("Data anda aman!");
                }
            });
    }


</script>