<div class="container-fluid">
    <form id="submit">
        <div class="form-group">
            <label for="title">Judul Pengumuman atau Artikel</label>
            <input type="text" class="form-control" name="post_judul" id="post_judul">
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="title">Gambar</label>
                    <input type="file" class="form-control-file" name="post_img" id="post_img">
                    <input type="text" class="form-control-file" name="post_imgval" id="post_imgval" value="default.png" hidden>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="post_tanggal" id="post_tanggal">
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="post_isi" id="post_isi" name="post_isi"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" id="btn_post" value="upload">Posting</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(() => {
        var editor = CKEDITOR.replace('post_isi');
        $('#submit').submit(function(e) {
            e.preventDefault();
            var post_judul = $('#post_judul').val();
            var post_tanggal = $('#post_tanggal').val();
            var post_isi = CKEDITOR.instances['post_isi'].getData();
            var data = new FormData(this);
            data.append('content', CKEDITOR.instances['post_isi'].getData());
            $.ajax({
                url: '<?php echo base_url(); ?>pengelola/blog/artikel/simpanartikel',
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    location.href="<?= base_url('pengelola/blog/artikel/dashboard/')?>";
                }
            });
        });
    });
</script>