<?php

require 'function.php';

$id = $_GET['id'];

if(hapusProduk($id) > 0 ){
    echo "
    <script type='text/javascript'>
        alert('Produk Berhasil Di hapus');
        window.location = 'produk.php';
    </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Produk gagal di hapus');
        window.location = 'produk.php';
    </script>
    ";
}

?>