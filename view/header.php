<?php

require_once "../core/init.php";
$super_user = $login = false;
if(isset($_SESSION['user'])){
    $login = true ;
    if(cek_admin($_SESSION['user']) == 1){
        $super_user = true;
        // echo 'admin';
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aplikasi Stok Barang</title>
</head>
<body>

<div>
    <nav>
        <ul>
            <h2>Aplikasi Stok Barang</h2>
        </ul>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <!-- <li>
                <a href="barangmasuk.php">Barang Masuk</a>
            </li>
            <li>
                <a href="barangkeluar.php">Barang Keluar</a>
            </li> -->
            <li>
                <a href="../kategori/kategori.php">Kategori</a>
            </li>
            <li>
                <a href="../record/brgmasuk.php">Barang Masuk</a>
            </li>
            <li>
                <a href="../record/brgkeluar.php">Barang Keluar</a>
            </li>
            <?php if($super_user == true){ ?>
            <li>
                <a href="../tambahuser.php">Tambah User</a>
            </li>
            <?php } ?>
            <li>
                <a href="../logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</div>