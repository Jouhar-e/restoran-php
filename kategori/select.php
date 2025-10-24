<?php

$sql = "SELECT * FROM categories";
$row = $db->getData($sql);

$no = 1;

?>

<h3>Data Kategori</h3>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($row)) : ?>
                <?php foreach ($row as $data) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['category'] ?></td>
                        <td>Aksi</td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Data Tabel Kosong</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>