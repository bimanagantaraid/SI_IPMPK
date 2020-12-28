<div class="container bg-white pt-2" style="width: 100%;">
    <h2 class="text-center"><?= $artikel->post_judul ?></h2>
    <img class="rounded mx-auto d-block" style="width:350px;" src="<?= base_url('upload/') . $artikel->post_img ?>">
    <p><?= $artikel->post_isi ?></p>
</div>