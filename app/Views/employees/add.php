<?= $this->extend('templates/master') ?>
<?= $this->section('headAdditional') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card card-body">
    <?php
    echo '<pre>';
    print_r($validation->listErrors());
    echo '</pre>';
    // die;  
    ?>
    <form role="form" class="needs-validation" novalidate action="<?= site_url('employees/store') ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Nama <?= $requiredLabel ?></label>
                <input type="text" name="name" id="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : null ?>" placeholder="Nama" value="<?= old('name') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="number">No Pegawai <?= $requiredLabel ?> (otomatis)</label>
                <input type="text" name="number" id="number" class="form-control is-invalid" value="<?= setDefaultValue($last_number) ?>" placeholder="No pegawai" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">Email <?= $requiredLabel ?></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin <?= $requiredLabel ?></label>
                <select class="form-select" name="gender" id="gender">
                    <option disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('gender') ?>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="address">Alamat <?= $requiredLabel ?></label>
                <textarea placeholder="Alamat" name="address" id="address" class="form-control"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('address') ?>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section('scriptAdditional') ?>
<?= $this->endSection() ?>