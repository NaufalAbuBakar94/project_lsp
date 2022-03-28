<?php

session_start();
require 'function.php';

if(isset($_POST["submit"])){
    if(editProduk($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data Berhasil Diubah');
            window.location = 'produk.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Gagal Diubah');
            window.location = 'edit_produk.php';
        </script>
        ";
    }
}

$id = $_GET["id"];
$data = query("SELECT * FROM produk WHERE id_produk = $id")[0];

?>
<?php include '../layout/sidebar.php' ?>

<div class="main">
    <div class="box">
        <h2>Edit Data Produk</h2>

        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_produk" class="form-control" value="<?= $data["id_produk"]; ?>">

            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $data["nama_produk"]; ?>"> <br> <br>

            <label>Harga Produk</label>
            <input type="text" name="harga" class="form-control" value="<?= $data["harga"]; ?>"> <br> <br>

            <label>Foto Produk</label>
            <input type="file" name="foto" class="form-control" value="<?= $data["foto"]; ?>"> <br> <br>

            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="<?= $data["stok"]; ?>"> <br> <br>

            <label>Deskripsi Produk</label> <br>
            <textarea name="deskripsi" rows="10" class="form-control"><?= $data["deskripsi"]; ?></textarea><br> <br>

            <button type="submit" name="submit">Edit Produk</button>
        </form>
    </div>
</div>