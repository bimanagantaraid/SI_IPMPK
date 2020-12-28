<div class="container-fluid">
    <div class="data-kasorganisasi mt-4">
        <h5 class="text-center">Data Kas <?= $anggota->Nama?></h5>
        <div class="table-responsive">
            <table class="table table-bordered" id="kasorganisasi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Setor</th>
                        <th>Jumlah Setor</th>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Diskripsi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var url = "<?= base_url('user/dashboard/getkasorganisasi') ?>";
        var kasorganisasi = $('#kasorganisasi').DataTable({
            "ajax": {
                "url": url,
                "dataSrc": ""
            },
            "columns": [{
                    "data": "Tanggal_setor"
                },
                {
                    "data": "Jumlah_setor",
                    "render": $.fn.dataTable.render.number('.', ',', 1, 'Rp')
                },
                {
                    "data": "Jenis"
                },
                {
                    "data": "Keterangan"
                },
                {
                    "data": "Diskripsi"
                }
            ]
        });
    });
</script>