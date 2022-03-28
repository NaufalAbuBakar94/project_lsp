<?php

require 'proses.php';

if(isset($_POST["register"])){
    if(tambahUser($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Pendaftaran akun anda telah berhasil, silahkan login')
            window.location = '../login/index.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Maaff, Pendaftaran akun anda gagal')
            window.location = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2><i>PrinterStrore</i></h2>
        <h3>Halaman Register</h3>

        <form action="" method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id=""> <br> <br>

            <label>Username</label>
            <input type="text" name="username" class="form-control" id=""> <br> <br>
            
            <label>Password</label>
            <input type="password" name="password" class="form-control" id=""> <br> <br>

            <label>Roles</label>
            <select name="roles" class="form-control"> 
                <option value="customer">Customer</option>
            </select><br> <br>

            <button type="submit" name="register">Register</button>
            <div class="login">
                <small>Sudah punya akun???</small> <br>
                    <a href="../login/index.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>