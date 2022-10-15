<?php switch ($act) {
    default: ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $title; ?></title>
        </head>

        <body>
            <button style="margin-bottom: 30px;"><a href="<?= base_url() ?>/<?= $module ?>/Add">Tambah</a></button>
            <table border="1">
                <thead>
                    <th>Aksi</th>
                    <th>Kode Wilayah</th>
                    <th>Nama Wilayah</th>
                    <th>Nama Area</th>
                    <th>User ID</th>
                </thead>
                <tbody>
                    <?php foreach ($iamwilayah as $key => $result) { ?>
                        <tr>
                            <td><a href="<?= base_url() ?>/<?= $module; ?>/edit/<?= $result->PID; ?>">edit</a>
                                <a href="<?= base_url(); ?>/<?= $module; ?>/delete/<?= $result->PID; ?>">hapus</a>
                            </td>
                            <td><?= $result->KODE_WILAYAH; ?></td>
                            <td><?= $result->NAMA_WILAYAH; ?></td>
                            <td><?= $result->NAMA_AREA; ?></td>
                            <td><?= $result->USER_ID; ?></td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </body>

        </html>

    <?php break;
    case 'formAdd': ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tambah <?= $title; ?></title>
        </head>

        <body>
            <form action="<?= base_url() ?>/<?= $module; ?>/insert" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <label for="">Kode Wilayah</label>
                <input type="text" id="kode" name="kode" placeholder="kode wilayah" style="margin-bottom: 10px;"><br>
                <label for="">Nama Wilayah</label>
                <input type="text" id="nama" name="nama" placeholder="nama wilayah" style="margin-bottom: 10px;"><br>
                <label for="">Nama Area</label>
                <input type="text" id="area" name="area" placeholder="area wilayah" style="margin-bottom: 10px;"><br>
                <button type="submit">Simpan</button>
                <button><a href="<?= base_url(); ?>/<?= $module; ?>">Kembali</a></button>
            </form>
        </body>

        </html>

    <?php break;
    case 'formEdit': ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit <?= $title; ?></title>
        </head>

        <body>
            <form action="<?= base_url() ?>/<?= $module; ?>/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" id="pid" name="pid" value="<?= $result->PID; ?>" readonly>

                <label for="">Kode Wilayah</label>
                <input type="text" id="kode" name="kode" placeholder="kode wilayah" style="margin-bottom: 10px;" value="<?= $result->KODE_WILAYAH; ?>" readonly><br>
                <label for="">Nama Wilayah</label>
                <input type="text" id="nama" name="nama" placeholder="nama wilayah" style="margin-bottom: 10px;" value="<?= $result->NAMA_WILAYAH; ?>"><br>
                <label for="">Nama Area</label>
                <input type=" text" id="area" name="area" placeholder="area wilayah" style="margin-bottom: 10px;" value="<?= $result->NAMA_AREA; ?>"><br>
                <button type=" submit">Update</button>
                <button><a href="<?= base_url(); ?>/<?= $module; ?>">Kembali</a></button>
            </form>
        </body>

        </html>

<?php break;
} ?>