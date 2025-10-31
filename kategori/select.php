<?php

$sql = "SELECT * FROM categories";
$row = $db->getData($sql);

$no = 1;

?>

<h3>Data Kategori</h3>
<a href="?f=kategori&&m=insert" class="btn btn-primary">Tambah Data</a>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($row)) : ?>
                <?php foreach ($row as $data) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['category'] ?></td>
                        <td>
                            <a href="?f=kategori&&m=update&&id=<?= $data['idcategory'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="text" value="<?= $data['idcategory'] ?>" name="idcategory" hidden>
                                <input type="submit" name="hapus" value="Hapus" class="btn btn-danger btn-sm">
                            </form>
                        </td>
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

<?php

if (isset($_POST['hapus'])) {
    $idcategory = $_POST['idcategory'];

    $sql = "DELETE FROM categories WHERE idcategory = $idcategory";
    // echo $sql;
    $db->runQuery($sql);
    header("location:?f=kategori&&m=select");
}

?>