<?php

require_once "core/init.php";

$error = '';

// redirect kalau user sudah register
// if(isset($_SESSION['user'])) header('Location: index.php');

//validasi register
if(isset($_POST['submit'])){
    $nama = $_POST['username'];
    $pass = $_POST['password'];
    $nm_lengkap = $_POST['nm_lengkap'];

    if(!empty(trim($nama)) && !empty(trim($pass)) && !empty(trim($nm_lengkap))){
        if(cek_nama($nama) == 0){
            //masukkan ke database
            if(register_user($nama, $pass, $nm_lengkap)) ;
            else $error =  'gagal';
        }else $error =  'nama sudah ada, tidak bisa daftar';

    }else $error =  'Tidak Boleh Kosong';       
}

require_once "view/header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/stylef.css">
    <title>Document</title>
</head>
<body>
    <div class="dov"></div>
<div class="form" align="center">
    <form action="tambahuser.php" method="post">
        <h2>Tambah User</h2><br>
        <label for="">Nama Lengkap:</label>
        <input class="input" type="text" name="nm_lengkap" placeholder="Nama Lengkap" id=""><br><br>
        <label for="">Username:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="input" type="text" name="username" placeholder="Username" id=""><br><br>
        <label for="">Password :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="input" type="password" name="password" placeholder="Password" id=""><br><br>

        <input class="submit" type="submit" name="submit" value="Register"><br><br>

        <?php if ($error != ''){  ?>
        <div id="error">
            <?= $error; ?>
        </div>
    <?php } ?>
        
    </form>
    <!-- <center><a href="login.php">Belum Punya Akun</a></center> -->
</div>
</body>
</html>