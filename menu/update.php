<?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE idcategory = $id";
    $data = $db->getValue($sql);

    // var_dump($data);

?>

<h3>Update Data Kategori</h3>
<div class="mt-4">
    <form action="" method="post" class="form-group">
        <div>
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" value="<?= $data['category'] ?>" name="kategori" placeholder="Isi data kategori" required>
        </div>
        <div>
            <input type="submit" class="btn btn-primary mt-3" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?php

    if (isset($_POST['simpan'])){
        $kategori = $_POST['kategori'];

        $sql = "UPDATE categories SET category = '$kategori' WHERE idcategory = $id";
        // echo $sql;
        $db->runQuery($sql);
        header("location:?f=kategori&&m=select");
    }
    
?>