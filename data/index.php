<?php
require_once "../core/init.php";

$super_user = $login = false;
if(isset($_SESSION['user'])){
    $login = true ;
    if(cek_admin($_SESSION['user']) == 1){
        $super_user = true;
    }
} 
if(!isset($_SESSION['user'])){
    header('location:../login.php');
}

require_once "../view/header.php"
?>

<div class="dov"></div><br><br>
<div>
    <h2 align="center">Barang</h2><br>
    <table border="1px" align="center" width="600px">
    <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <?php if($super_user == true){ ?>
            <th>Opsi</th>
            <?php } ?>
        </tr>
        <?php 
    $no=0;
    $query = "SELECT * FROM tb_barang  INNER JOIN tb_kategori  ON tb_barang.id_kategori = tb_kategori.id";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $no++;
        echo "<tr align = center >";
        echo "<td>".$no."</td>";
        echo "<td>".$row['nama_kt']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td> <img id='img_pos' height='80' width='80' src='../gambar/".$row['gambar']."'></td>";
        echo "<td>".$row['harga']."</td>";
        echo "<td>".$row['jumlah']."</td>";
        if($super_user == true){ 

        echo"<td> <a href='editbrg.php?id=$row[id]'>edit </a> | <a href='hapusbrg.php?id=$row[id]'>Delete </a></td>";
             } 
        // echo "<td>".$row['keterangan']."</td>";
        echo "</tr>";
        } ?>
    </table>
    <?php if($super_user == true){ ?>
    <div align="center"><br>
    <a href="tambahbrg.php" ><button>Tambah Barang</button></a>
    </div>
    <?php } ?>
</div>