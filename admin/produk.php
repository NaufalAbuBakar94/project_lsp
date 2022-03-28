<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php'   
    </script>
    ";
}

if($_SESSION["roles"] != "admin"){
    echo "
    <script>
        alert('Anda bukan admin')
        window.location = '../login/index.php'
    </script>
    ";
}

$produk = query("SELECT * FROM produk");

?>

<?php include '../layout/sidebar.php' ?>

<div class="main">
    <h3>Data Produk</h3>
    <a href="tambah_produk.php" class="tambah">Tambah Data Produk</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($produk as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td>Rp. <?= number_format($data["harga"]); ?></td>
            <td><img src="../foto/<?= $data["foto"]; ?>" width="80px" alt=""></td>
            <td>
                <a href="edit_produk.php?id=<?= $data["id_produk"]; ?>" class="edit">Edit</a>
                <a href="hapus_produk.php?id=<?= $data["id_produk"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus')" class="hapus">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>