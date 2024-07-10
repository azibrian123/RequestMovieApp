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
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $video->nama; ?> (<?= $video->tahun; ?>)</h5>
                        <p class="card-text"><?= $video->deskripsi; ?></p>

                        <button class="btn btn-success" disabled><?= $video->status; ?></button>

                        <a href="" class="btn btn-primary">Tonton Video</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


</div>
<?= $this->endSection(); ?>