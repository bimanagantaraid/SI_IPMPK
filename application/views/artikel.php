<div class="container-fluid">
    
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm">
                    <h6 class="m-2 font-weight-bold text-primary">DATA ARTIKEL DAN PENGUMUMAN</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Tanggal Posting</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $tabel = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('home/json_artikel') ?>",
                "type": "POST"
            }
        });
    })

</script>