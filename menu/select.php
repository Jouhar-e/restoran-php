<?php

$sql = "SELECT * FROM vitems";
$row = $db->getData($sql);

$no = 1;

?>

<div class="row">
    <div class="col-md-10">
        <h3>Data Menu</h3>
    </div>
    <div class="col-md-2 mt-2">
        <a href="?f=menu&&m=insert" class="btn btn-primary">Tambah Data</a>
    </div>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Menu</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col" class="text-center" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($row)) : ?>
                <?php foreach ($row as $data) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['category'] ?></td>
                        <td><?= $data['item'] ?></td>
                        <td>
                            <img src="uploads/<?= $data['path'] ?>" alt="<?= $data['item'] ?>" width="100">
                        </td>
                        <td><?= 'Rp. ' . $data['price'] ?></td>
                        <td class="text-center">
                            <a href="?f=menu&&m=update&&id=<?= $data['iditem'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                        </td>
                        <td class="text-center">
                            <form action="" method="post">
                                <input type="text" value="<?= $data['iditem'] ?>" name="iditem" hidden>
                                <input type="submit" name="hapus" value="Hapus" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Data Tabel Kosong</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php

if (isset($_POST['hapus'])) {
    $iditem = $_POST['iditem'];

    $sql = "DELETE FROM items WHERE iditem = $iditem";
    // echo $sql;
    $db->runQuery($sql);
    header("location:?f=menu&&m=select");
}

?>