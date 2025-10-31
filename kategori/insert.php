<h3>Tambah Data Kategori</h3>
<div class="mt-4">
    <form action="" method="post" class="form-group">
        <div>
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" name="kategori" placeholder="Isi data kategori" required>
        </div>
        <div>
            <input type="submit" class="btn btn-primary mt-3" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?php

    if (isset($_POST['simpan'])){
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO categories VALUES (NULL, '$kategori')";
        // echo $sql;
        $db->runQuery($sql);
        header("location:?f=kategori&&m=select");
    }
    
?>