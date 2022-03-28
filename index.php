<?php include 'layout/navbar.php'; ?>

<?php

$data = query("SELECT * FROM produk");

?>

<div class="hero">
<img src="foto/iklan.jpg" alt="">
</div>

<div class="container">
    <div class="text-produk">
        <h2>Produk Terbaru</h2>
    </div>

    <div class="wrapper-produk">
        <?php foreach($data as $produk) : ?>
        <div class="produk">
            <a href="detail.php?id=<?= $produk["id_produk"]; ?>">
                <img src="foto/<?= $produk["foto"]; ?>" alt="">
                <h2><?= $produk["nama_produk"]; ?></h2>
                <p>Rp. <?= number_format($produk["harga"]); ?></p>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>