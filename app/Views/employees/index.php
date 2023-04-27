<?= $this->extend('templates/master') ?>
<?= $this->section('headAdditional') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($employees)) :
                    foreach ($employees as $key => $employee) : ?>
                        <tr>
                            <td><?= ($key + 1) ?></td>
                            <td><?= $employee['name'] ?></td>
                            <td><?= $employee['number'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['gender'] ?></td>
                            <td><?= $employee['address'] ?></td>
                        </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scriptAdditional') ?>
<?= $this->endSection() ?>