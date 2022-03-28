<?php

require '../koneksi.php';

function tambahUser($data){
    global $conn;

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $roles = $_POST["roles"];

    $query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$nama','$username', '$password', '$roles')");

    return mysqli_affected_rows($conn);
}





?>