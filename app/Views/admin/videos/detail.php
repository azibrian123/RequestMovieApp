<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $video->sampul; ?>" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $video->nama; ?> (<?= $video->tahun; ?>)</h5>
                            <p class="card-text"><?= $video->deskripsi; ?></p>


                            <a href="/admin/video/edit/<?= $video->id; ?>" class="btn btn-warning">Edit</a>

                            <form action="/admin/video/<?= $video->id; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection(); ?>