<?php
require_once "../core/init.php";


$error = '';

if( isset($_POST['submit'])) {
    $kategori  = $_POST['id'];
    $nama      = $_POST['nama'];
    $img       = $_FILES['gambar']['name'];
    $target    = "../gambar/".basename($img);
    $harga     = $_POST['harga'];
    $jumlah    = $_POST['jumlah'];


    if(!empty(trim($kategori)) && !empty(trim($nama)) && !empty(trim($img)) && !empty(trim($harga)) && !empty(trim($jumlah))){
            if(tambah_data($kategori, $nama, $img, $harga, $jumlah)){
                header('Location: index.php');
            }else{
                $eror = 'ada masalah saat menambah data';
            }
    }else{
        $eror = 'judul dan konten wajib diisi';
    }
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $message[] = "image uploded succes";
    }else{
        $message[] = "there was a problem uploding image";
    }
}
require_once "../view/header.php";
?>
<div class="brg" align="center">
    <h2>Tambah Barang</h2>
<form action=""method="post" enctype="multipart/form-data">
    <label for="">Kategori</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="kategori" name="id"><br><br>
    <?php
    $hasil = mysqli_query($link, "SELECT * FROM tb_kategori");
    while($data = mysqli_fetch_assoc($hasil)){
        ?>
        <option value="<?= $data['id'] ?>"><?= $data['nama_kt'] ?></option>
        <?php
    }
    ?>
    <br><br>
    <label for="">Nama Barang</label>
    <input type="text" name="nama"><br><br>
    <label for="">Gambar</label>
    <input type="file" name="gambar" class="box" required><br><br>
    <label for="">Harga</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="harga"><br><br>
    <label for="">Jumlah</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="jumlah"><br><br>
    <div id="error">
        <?=$error ?>
    </div>
    <input type="submit" name="submit" valua="submit">
    </form>
    </div>
<?php 
require_once "../view/footer.php";
?>  