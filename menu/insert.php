<?php

$sql = "SELECT * FROM categories";
$categories = $db->getData($sql);

?>

<h3>Tambah Data Menu</h3>
<div class="mt-4">
    <form action="" method="post" class="form-group" enctype="multipart/form-data">
        <div>
            <label for="item" class="form-label">Menu</label>
            <input type="text" class="form-control" name="item" placeholder="Isi data menu" required>
        </div>
        <div>
            <label for="idcategory">Kategori</label>
            <select name="idcategory" class="form-select" aria-label="Default select example">
                <option selected>Pilih Kategori</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['idcategory'] ?>"><?= $category['category'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="path" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="path" placeholder="Isi data Gambar" required>
        </div>
        <div>
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="price" placeholder="Isi data menu" required>
        </div>
        <div>
            <input type="submit" class="btn btn-primary mt-3" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $item = $_POST['item'];
    $idcategory = $_POST['idcategory'];
    $img = $_FILES['path']['name'];
    $tmp = $_FILES['path']['tmp_name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO items VALUES (NULL, '$idcategory', '$item', '$img', $price)";
    // echo $sql;
    move_uploaded_file($tmp, "uploads/" . $img);
    $db->runQuery($sql);
    header("location:?f=menu&&m=select");
}

?>