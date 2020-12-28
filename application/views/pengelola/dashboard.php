<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data User</h5>
                <h3 class="card-value"><?= $jumlahuser?> Users</h3>
                <a href="<?= base_url('pengelola/user/anggota') ?>" class="card-link"><button class="btn btn-sm btn-primary">Anggota</button></a>
                <a href="<?= base_url('pengelola/user/donatur') ?>" class="card-link"><button class="btn btn-sm btn-warning">Donatur</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Keuangan Organisasi</h5>
                <h3 class="card-value"><?= $hasiljumlah?></h3>
                <a href="<?= base_url('pengelola/kasorganisasi/dashboard') ?>" class="card-link"><button class="btn btn-sm btn-primary">Detail</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Keuangan Qurban</h5>
                <h3 class="card-value"><?= $kaskurban?></h3>
                <a href="<?= base_url('pengelola/kaskurban/dashboard') ?>" class="card-link"><button class="btn btn-sm btn-primary">Detail</button></a>
            </div>
        </div>
    </div>
</div>