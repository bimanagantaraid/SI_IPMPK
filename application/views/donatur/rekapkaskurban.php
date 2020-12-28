<div class="container-fluid">
    <div class="data-kurban mt-4">
        <h5 class="text-center">Data Iuran Kas Kurban <?= $donatur->Nama ?></h5>
        <div class="table-responsive">
            <table class="table table-bordered" id="kaskurban" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Setor</th>
                        <th>Jumlah Setor</th>
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
        var urlkurban = "<?= base_url('donatur/dashboard/getrekapkaskurban/'); ?>";
        var Id_kaskurban = "<?= $this->uri->segment(4)?>"
        var base_url = urlkurban+Id_kaskurban;
        var iurankurban = $('#kaskurban').DataTable({
            "ajax":{
                url : base_url,
                dataSrc: ""
            },
            "columns": [{
                    "data": null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "Tanggal_setor",
                    "className": 'text-center',
                    "render": function(data, type, row, meta) {
                        return moment(data).format('DD MMMM YYYY')
                    }
                },
                {
                    "data": "Jumlah_setor",
                    "render": $.fn.dataTable.render.number('.', '.', 0, 'Rp'),
                    "className": 'text-center'
                }
            ]
        })
    });
</script>