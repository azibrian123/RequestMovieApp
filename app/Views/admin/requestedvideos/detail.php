<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <div class="col">

                <div class="card h-100">
                    <img src="/img/<?= $video->sampul; ?>" class="card-img-top" height="400px" style="object-fit: cover; object-position: 100% 0;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $video->nama; ?> (<?= $video->tahun; ?>)</h5>
                        <p class="card-text"><?= $video->deskripsi; ?></p>
                    </div>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <h5 class="d-inline">Data Customer yang request
                        </li>
                        <div class="card-body">
                            <p>Customer : <?= $video->username; ?></p>
                            <p>Fullname : <?= $video->fullname; ?></p>
                        </div>
                    </ul>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <h5 class="d-inline">Status Request
                        </li>
                        <div class="card-body">

                            <button class="btn btn-success" disabled><?= $video->status; ?></button>
                        </div>
                    </ul>

                    <div class="card-footer">

                        <form action="/admin/requestvideos/approve/<?= $video->requestid; ?>" method="post">
                            <?= csrf_field(); ?>

                            <label for="waktu" class="col-sm-2 col-form-label">Skala Waktu (Jam)</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control" id="waktu" name="waktu" value="<?= old('waktu'); ?>">
                            </div>

                            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('apakah anda yakin?')" style="margin: auto; display: block; text-align: center;">Approve request video</button>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <?= $this->endSection(); ?>