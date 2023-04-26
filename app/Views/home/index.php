<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= !empty($title) ? $title : 'index' ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>

<body>
    <h1>Selamat Datang</h1>
    <table border="1" rules="ALL">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <?php if (!empty($employee)) :
            foreach ($employee as $key => $emp) : ?>
                <tr>
                    <td><?= ($key + 1) ?></td>
                    <td><?= $emp['name'] ?></td>
                    <td><?= $emp['nim'] ?></td>
                    <td><?= $emp['gender'] ?></td>
                    <td><?= $emp['address'] ?></td>
                </tr>
        <?php endforeach;
        endif; ?>

    </table>

</body>

</html>