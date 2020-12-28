<div class="container d-flex justify-content-center">
    <div class="card" style="width:40rem;">
        <div class="card-body">
            <form action="<?= base_url('user/dashboard/profileupdate'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="Nama" name="Nama">
                    <input type="text" class="form-control" id="Id_anggota" name="Id_anggota" hidden>
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
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" id="User_img" name="User_img">
                    <input type="text" class="form-control" id="User_imgDefault" name="User_imgDefault" hidden>
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
            url: "<?= base_url('user/dashboard/getprofile') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#Nama').val(data.Nama);
                $('#Id_anggota').val(data.Id_anggota);
                $('#Username').val(data.Username);
                $('#Password').val(data.Password);
                $('#Jabatan').val(data.Jabatan);
                $('#Status').val(data.Status);
                $('#ttl').val(data.ttl);
                $('#Jenis_kelamin').val(data.Jenis_kelamin);
                $('#Alamat_rumah').val(data.Alamat_rumah);
                $('#Alamat_kost').val(data.Alamat_kost);
                $('#No_HP').val(data.No_HP);
                $('#Hobi').val(data.Hobi);
                $('#User_imgDefault').val(data.User_img);
            }
        });
    })
</script>