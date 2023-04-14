<?php

require_once "../core/init.php";

$error = '';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $ket = $_POST['keterangan'];

    if(!empty(trim($nama))){
        if(tambah_data_kt($nama, $ket)){
            header('location:kategori.php');    

        }else $error =  'ada masalah dalam memasukkan data';

    }else $error =  'Tidak Boleh Kosong';       
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style.css">
    <title>Document</title>
</head>
<body>
    <div class="dov"></div>
<div class="form" align="center">
    <form action="tambahkt.php" method="post">
        <h2>Tambah Kategori</h2><br>
        <label for="">Nama Kategori:</label>
        <input class="input" type="text" name="nama" placeholder="Nama Kategori" id=""><br><br>
        <label for="">Keterangan:</label>
        <input class="input" type="text" name="keterangan" placeholder="Keterangan" id=""><br><br>

        <input class="submit" type="submit" name="submit" value="Tambah Kategori"><br><br>

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