<?php
require_once "../core/init.php";

$error = '';

if(!$_SESSION['user']){
    header('Location: login.php');
}

require_once "../view/header.php";

$error = '';
$id    = $_GET["id"];

if(isset($_GET["id"])){
    $bio = tampilkan_pe_id($id);
    while($row = mysqli_fetch_assoc($bio)){
        $nama_awal        = $row["nama_kt"];
        $keterangan_awal  = $row["keterangan"];
    }
}

if(isset($_POST['submit'])){
    $nama       = $_POST["nama_kt"];
    $katerangan = $_POST["keterangan"];

    if(!empty(trim($nama)) && !empty(trim($katerangan)) ){

        if(edit_data_kt($nama, $katerangan, $id)){
            header('Location: kategori.php');
        }else{
            $error = 'ada masalah saat update data';
        }
    }else{
        $error = 'data harus di isi';
    }
}

?>

<br>

<h1>Edit Barang</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="nama">Nama</label><br>
    <input type="text" name="nama_kt" value="<?= $nama_awal;?>"><br><br>

    <label for="keterangan">Keterangan</label><br>
    <input type="text" name="keterangan" value="<?= $keterangan_awal;?>"><br><br>

    <div id="error"><?= $error ?></div><br>

    <input type="submit" name="submit" value="Submit">
</form>