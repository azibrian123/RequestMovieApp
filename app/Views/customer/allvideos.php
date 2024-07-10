<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php foreach ($videos as $video) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="/img/<?= $video->sampul; ?>" class="card-img-top" height="300px" style="object-fit: cover; object-position: 100% 0;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $video->nama; ?> (<?= $video->tahun; ?>)</h5>
                        <p class="card-text"><?= $video->deskripsi; ?></p>

                        <form action="/customer/request/<?= $video->id; ?>" method="post" style="margin: auto; display: block; text-align: center;">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('apakah anda yakin?')">Request Video</button>

                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


</div>
<?= $this->endSection(); ?>