<?= $this->extend('templates/master') ?>
<?= $this->section('headAdditional') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card card-body">
    <form role="form" action="<?= site_url('employees/store') ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Nama <?= $requiredLabel ?></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nim">NIM <?= $requiredLabel ?></label>
                <input type="text" name="nim" id="nim" class="form-control" placeholder="Nomor Induk Mahasiswa">
            </div>
            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin <?= $requiredLabel ?></label>
                <select class="form-select mb-3" name="gender" id="gender">
                    <option disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address">Alamat <?= $requiredLabel ?></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat">
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