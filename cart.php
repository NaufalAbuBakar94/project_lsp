<?php include 'layout/navbar.php'; ?>

<?php

if(empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang Kosong, silahkan belanja terlebih dahulu');</script>";
    echo "<script>location= 'index.php';</script>";
}

?>

<div class="container">
    <?php foreach($_SESSION["cart"] as $id_produk => $hasil): ?>
    <?php
        $data = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];
        $subtotalHarga = $hasil * $data["harga"];
    ?>

    <div class="cart-cart">
        <img src="foto/<?= $data["foto"]; ?>" width="20%" alt="">
        <div class="child-cart">
            <h4 class="nama">Nama Produk : <?= $data["nama_produk"]; ?></h4>
            <h4>Harga Satuan : <?= number_format($data["harga"]); ?></h4>
            <h4 style="margin-top: 10px;">Total Harga : <?= number_format($subtotalHarga); ?></h4>
            <h4 style="margin-top: 10px; margin-bottom: 10px;"><?php echo $_SESSION["nama"]; ?></h4>

            <a href="hapus_cart.php?id=<?= $data["id_produk"]; ?>" class="hapus-cart">Hapus</p>
            <a href="checkout.php" class="checkout">Checkout Produk</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>