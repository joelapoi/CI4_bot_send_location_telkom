<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Edit Data</h2>
            <form action="/Users/update/<?= $users['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <?= $users['nama']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_user" class="col-sm-2 col-form-label">Id_User</label>
                    <div class="col-sm-10">
                        <?= $users['id_user']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                        <?= $users['kontak']; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="akses" class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="akses" value="<?= $users['akses']; ?>" id="akses">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mt-5">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>