<?php
require_once "../core/init.php";

$error = '';

if(!$_SESSION['user']){
    header('Location: ../login.php');
}



$error = '';
$id    = $_GET["id_barang"];

if(isset($_GET["id_barang"])){
    $bio = tampilkan_per_id($id);
    while($row = mysqli_fetch_assoc($bio)){
        $kategori_awal = $row["id_kategori"];
        $nama_awal     = $row["nama"];
        $img_awal      = $row["gambar"];
        $harga_awal    = $row["harga"];
        $jumlah_awal   = $row["jumlah"];
        $target_awal   = "../gambar/".basename($img_awal);
    }
}

if(isset($_POST["submit"])){
    $kategori = $_POST["id_kategori"];
    $nama     = $_POST["nama"];
    $img      = $_FILES["gambar"]["name"];
    $target   = "../gambar/".basename($img);
    $harga    = $_POST["harga"];
    $jumlah   = $_POST["jumlah"];

    if(!empty(trim($kategori)) && !empty(trim($nama)) && !empty(trim($img)) && !empty(trim($harga)) && !empty(trim($jumlah)) ){

        if(edit_data($kategori, $nama, $img, $harga, $jumlah, $id)){
            header('Location: index.php');
        }else{              
            $error = 'ada masalah saat update data';
        }
    }else{
        $error = 'data harus di isi';
    }
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $message[] = "image uploded succes";
    }else{
        $message[] = "there was a problem uploding image";
    }
}

require_once "../view/header.php";
?>

<?php
?>

<br>
<div class="edit">
<h1>Edit Barang</h1>

<form action="" method="post" enctype="multipart/form-data">
<label for="">Kategori</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="kategori" name="id_kategori"><br><br>
<?php
    $hasil = mysqli_query($link, "SELECT * FROM tb_kategori");
    while($data = mysqli_fetch_assoc($hasil)){
        ?>
        <option value="<?= $data['id'] ?>"><?= $data['nama_kt'] ?></option>
        <?php
    }
    ?>
    <br>
    <label for="nama">Nama</label><br>
    <input type="text" name="nama" value="<?= $nama_awal;?>"><br><br>

    <label for="gambar">Gambar</label><br>
    <input type="file" name="gambar" value="<?= $target_awal;?>"><br><br>

    <label for="harga">Harga</label><br>
    <input type="text" name="harga" value="<?= $harga_awal;?>"><br><br>

    <label for="hobi">Jumlah</label><br>
    <input type="text" name="jumlah" value="<?= $jumlah_awal;?>"><br><br>

    <div id="error"><?= $error ?></div><br>

    <input type="submit" name="submit" value="Submit">
</form>
</div>