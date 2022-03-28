<?php include 'layout/navbar.php'; ?>

<?php

if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang Kosong, silahkan belanja terlebih dahulu');</script>";
    echo "<script>location= 'index.php';</script>";
}

$totalBelanja = 0; ?>
<?php foreach ($_SESSION['cart'] as $produk => $result) : ?>

<?php $data = query("SELECT * FROM produk WHERE id_produk = '$produk'")[0];
    $totalHarga = $result * $data["harga"];
    ?>

<?php endforeach; 

?>

<div class="container">
    <div class="card-checkout">
        <form action="" method="POST">
            <label>Nama Penerima</label>
            <input type="text" name="name" class="form-control" value="<?= $_SESSION['nama']; ?>"> <br> <br>

            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat"> <br> <br>

            <label>No Handphone</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp"> <br> <br>

            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk']; ?>"> <br> <br> 

            <label>Harga Satuan</label>
            <input type="text" name="harga" class="form-control" value="<?= ($data['harga']); ?>"> <br> <br>
            
            <label>Sub total Harga</label>
            <input type="text" name="subtotal" class="form-control" value="<?= $totalHarga = $result * $data['harga']; ?>"> <br> <br>

            <input type="hidden" name="foto" value="<?= $data['foto']; ?>"> <br><br>

            <button type="submit" name="checkout" class="btn-checkout">Kirim</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['checkout'])) {
    if(checkout($_POST) > 0 ) {
        echo "
        <script>
            alert('Pembelian Sukses!');
            location = 'index.php';
        </script>
        ";
    }else{
        echo mysqli_error($conn);
    }
}
?>

