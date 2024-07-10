<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><?= $title; ?></h2>

            <form action="/admin/customer/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ((session('validation') && session('validation')->hasError('email'))) ? 'is-invalid' : '' ?>" id="email" name="email" autofocus value="<?= old('email'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (session('validation')) : ?>
                                <?= session('validation')->getError('email'); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= old('fullname'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="role" name="role" value="<?= old('role'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                    </div>
                </div>

        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
</div>

<?= $this->endSection(); ?>