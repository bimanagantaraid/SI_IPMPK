<div class="row">
    <div class="col-sm-4 text-white ">
        <div class="card bg-primary">
            <div class="card-body">
                <h5 class="card-title">Iuran Kas Kurban Anda</h5>
                <h4 class="mb-4"><?= $kaskurban ?></h4>
                <a href="<?= base_url('donatur/dashboard/kaskurban') ?>" class="btn-sm btn-info text-white">Detail Kas</a>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h4 class="text-weight-bold"><?= $donatur->Nama ?></h4>
                <table class="mb-3 text-white">
                    <tr>
                        <td><span class="font-weight-bold">Jenis Kelamin</span></td>
                        <td>: <?= $donatur->Jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Agama</span></td>
                        <td>: <?= $donatur->Agama; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Alamat Rumah</span></td>
                        <td>: <?= $donatur->Alamat_rumah; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">No HP</span></td>
                        <td>: <?= $donatur->No_HP; ?></td>
                    </tr>
                </table>
                <div class="text-right">
                    <a href="<?= base_url('donatur/dashboard/profile') ?>" class="btn-sm btn-warning text-right">Ubah Data</a>
                </div>
            </div>
        </div>
    </div>
</div>