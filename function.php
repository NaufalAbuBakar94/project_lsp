<?php

session_start();
require 'koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

function checkout($data){
    global $conn;

    foreach($_SESSION['cart'] as $product_id => $result) : ?>
        <?php $barang = query("SELECT * FROM produk WHERE id_produk = $product_id")[0];
        $totalHarga = $result * $barang["harga"];
        ?>
    <?php endforeach;

    $name = $_SESSION['nama'];
    $alamat = $data['alamat'];
    $no_telp = $data['no_hp'];
    $nama_produk = $barang['nama_produk'];
    $harga = $barang['harga'];
    $price = $totalHarga;

    $foto = $barang['foto'];
    $id = $barang['id_produk'];

    $stok = $barang['stok'];
    $sisa = $stok - $result;

    $st = 'proses';
    $queryCheckout = "INSERT INTO transaksi VALUES(NULL, '$name', '$alamat', '$no_telp', '$nama_produk', '$harga', '$price', '$foto', '$st')";

    unset($_SESSION['cart']);
    mysqli_query($conn, $queryCheckout);
        if($queryCheckout){
            $updateStok = mysqli_query($conn, "UPDATE produk SET stok = '$sisa' WHERE id_produk = '$id'");
        }
    return mysqli_affected_rows($conn);
}

?>