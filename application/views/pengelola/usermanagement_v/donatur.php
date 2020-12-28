<div class="card shadow mb-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm">
                <h6 class="m-2 font-weight-bold text-primary">DATA DONATUR</h6>
            </div>
            <div class="col-sm text-right">
                <button class="m-2 btn btn-sm btn-primary" id="tambahuser"><i class="fas fa-plus-square mr-2"></i>Tambah Data Donatur</button>
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

<!-- Modal Tambah User Donatur -->
<div class="modal fade" id="formtambah" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Donatur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="Nama" name="Nama">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="Username" name="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" id="Password" name="Password">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" id="Jenis_kelamin" name="Jenis_kelamin">
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
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
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" id="Alamat_rumah" name="Alamat_rumah">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" id="No_HP" name="No_HP">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_simpan">Tambah Donatur</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit User Donatur -->
<div class="modal fade" id="formedit" tabindex="-1" aria-labelledby="TambahModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-title">Edit Donatur</h5>
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
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="UsernameEdit" name="UsernameEdit">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" id="PasswordEdit" name="PasswordEdit">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" id="Jenis_kelaminEdit" name="Jenis_kelaminEdit">
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
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
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" id="Alamat_rumahEdit" name="Alamat_rumahEdit">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" class="form-control" id="No_HPEdit" name="No_HPEdit">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn_edit">Edit Anggota</button>
            </div>
        </div>
    </div>
</div>



<script>
    /* -- datatable users -- */
    $datatable = $(document).ready(function() {
        $('#dataTableUser').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('pengelola/user/donatur/json_anggota') ?>",
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
                null,
                {
                    "width": "15%"
                }
            ]
        });
    });

    /* -- tambah user anggota -- */
    $(document).on('click', '#tambahuser', () => {
        $('#formtambah').modal('show');
        $('#btn_simpan').on('click', () => {
            var Nama = $('#Nama').val();
            var Username = $('#Username').val();
            var Password = $('#Password').val();
            var Jenis_kelamin = $('#Jenis_kelamin').val();
            var Agama = $('#Agama').val();
            var Alamat_rumah = $('#Alamat_rumah').val();
            var No_HP = $('#No_HP').val();
            $.ajax({
                url: "<?= base_url('pengelola/user/donatur/tambah') ?>",
                method: "POST",
                data: {
                    Nama: Nama,
                    Username: Username,
                    Password: Password,
                    Jenis_kelamin: Jenis_kelamin,
                    Agama: Agama,
                    Alamat_rumah: Alamat_rumah,
                    No_HP: No_HP,
                },
                success: function(data) {
                    swal("Tambah Data User Berhasil!", {
                        icon: "success"
                    });

                    $('.swal-button--confirm').on('click', () => {
                        $('#formtambah').modal('hide');
                        location.reload();
                    })
                }
            });
        });
    });

    /* -- edit data user -- */
    function edit(dataedit) {
        var Id = $(dataedit).attr('Id');
        $('#edit-title').html('INFO DONATUR');
        const forminput = document.querySelectorAll('#formedit input, #formedit select');
        forminput.forEach((e) => {
            e.disabled = false;
        })
        $('#formedit').modal('show');
        getdetail(Id);
        $('#btn_edit').on('click', () => {
            /* get value input */
            var Id = $('#IdEdit').val();
            var Role = $('#RoleEdit').val();
            var Username = $('#UsernameEdit').val();
            var Password = $('#PasswordEdit').val();
            var Nama = $('#NamaEdit').val();
            var Agama = $('#AgamaEdit').val();
            var Alamat_rumah = $('#Alamat_rumahEdit').val();
            var Jenis_kelamin = $('#Jenis_kelaminEdit').val();
            var No_HP = $('#No_HPEdit').val();
            swal({
                    title: "Anda yakin mau merubah?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        $.ajax({
                            url: "<?= base_url('pengelola/user/donatur/edit') ?>",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                Id_donatur: Id,
                                Role: Role,
                                Nama: Nama,
                                Username: Username,
                                Password: Password,
                                Jenis_kelamin: Jenis_kelamin,
                                Agama: Agama,
                                Alamat_rumah: Alamat_rumah,
                                No_HP: No_HP
                            },
                            success: function(data) {
                                swal("Edit Data User Berhasil!", {
                                    icon: "success"
                                });

                                $('.swal-button--confirm').on('click', () => {
                                    $('#formedit').modal('hide');
                                    location.reload();
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
            url: "<?= base_url('pengelola/user/donatur/json_getdetail/') ?>" + Id,
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#IdEdit').val(data.Id_donatur);
                $('#RoleEdit').val(data.Role);
                $('#UsernameEdit').val(data.Username);
                $('#PasswordEdit').val(data.Password);
                $('#NamaEdit').val(data.Nama);
                $('#AgamaEdit').val(data.Agama);
                $('#Alamat_rumahEdit').val(data.Alamat_rumah);
                $('#Jenis_kelaminEdit').val(data.Jenis_kelamin);
                $('#No_HPEdit').val(data.No_HP);
            }
        });
    };

    /* -- get info detail user -- */
    function info(datainfo) {
        var Id = $(datainfo).attr('Id');
        $('#formedit').modal('show');
        $('#edit-title').html('INFO DONATUR');
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
                        url: "<?php echo site_url('pengelola/user/donatur/hapus/'); ?>" + Id,
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

    /* -- reset modal -- */
    $(document).ready(function() {
        $(".modal").on("hidden.bs.modal", function() {
            $(this).removeData();
        });
    });
</script>