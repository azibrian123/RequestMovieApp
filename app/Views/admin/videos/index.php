<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">


            <a href="/admin/video/create" class="btn btn-primary mb-3">Tambah Video</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($videos as $video) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $video->sampul; ?>" style="width: 100px" ;></td>
                            <td><?= $video->nama; ?></td>
                            <td><?= $video->tahun; ?></td>
                            <td><?= $video->deskripsi; ?></td>
                            <td>
                                <a href="<?= base_url('admin/video/' . $video->id); ?>" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>