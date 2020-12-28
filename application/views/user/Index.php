<div class="row">
    <div class="col-sm-4 text-white">
        <div class="row d-flex justify-content-center">
            <div class="col-11 card bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Iuran Kas Kurban Anda</h5>
                    <h4 class="mb-4"><?= $kaskurban ?></h4>
                    <a href="<?= base_url('user/dashboard/kaskurban') ?>" class="btn-sm btn-info text-white">Detail Kas</a>
                </div>
            </div>
            <div class="col-11 card bg-success">
                <div class="card-body">
                    <h5 class="card-title">Iuran Kas Organisasi Anda</h5>
                    <h4 class="mb-4"><?= $kasorganisasi ?></h4>
                    <a href="<?= base_url('user/dashboard/kasorganisasi') ?>" class="btn-sm btn-info text-white">Detail Kas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <h5 class="text-weight-bold"><?= $anggota->Nama ?></h5>
                        <img src="<?= base_url('upload/user_img/') . $anggota->User_img; ?>" alt="profile" class="rounded" style="width: 150px;">
                    </div>
                    <div class="col-sm">
                        <table class="mb-3">
                            <tr>
                                <td><span class="font-weight-bold">Jabatan</span></td>
                                <td>: <?= $anggota->Jabatan; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold">Status</span></td>
                                <td>: <?= $anggota->Status; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold" style="margin-right: 20px;">No Telepon</span></td>
                                <td>: <?= $anggota->No_HP; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold" style="margin-right: 20px;">Alamat Rumah</span></td>
                                <td>: <?= $anggota->Alamat_rumah; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold" style="margin-right: 20px;">Alamat Kost</span></td>
                                <td>: <?= $anggota->Alamat_kost; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold" style="margin-right: 20px;">Jenis Kelamin</span></td>
                                <td>: <?= $anggota->Jenis_kelamin; ?></td>
                            </tr>
                            <tr>
                                <td><span class="font-weight-bold" style="margin-right: 20px;">Agama</span></td>
                                <td>: <?= $anggota->Agama; ?></td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <a href="<?= base_url('user/dashboard/profile')?>" class="btn-sm btn-warning text-right">Ubah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>