<div class="container d-flex justify-content-center">
    <div class="card" style="width:40rem;">
        <div class="card-body">
            <form action="<?= base_url('donatur/dashboard/profileupdate'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="Nama" name="Nama">
                    <input type="text" class="form-control" id="Id_donatur" name="Id_donatur" hidden>
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
                    <label>No Telp</label>
                    <input type="text" class="form-control" id="No_HP" name="No_HP">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn-sm btn-primary" id="simpan" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('donatur/dashboard/getprofile') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#Id_donatur').val(data.Id_donatur);
                $('#Nama').val(data.Nama);
                $('#Username').val(data.Username);
                $('#Password').val(data.Password);
                $('#Alamat_rumah').val(data.Alamat_rumah);
                $('#No_HP').val(data.No_HP);
            }
        });
    })
</script>