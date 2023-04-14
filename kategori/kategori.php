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

// $kategori = tampilkankt();

require_once "../view/header.php";

?>

<div class="dov"></div><br><br>
<div>
    <h2 align="center">Kategori Barang</h2><br>
    <table border="1px" align="center" width="600px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <?php if($super_user == true){ ?>
            <th>action</th>
            <?php } ?>
            <!-- <th>Keterangan</th> -->
        </tr>
        <a href=""></a>
    <?php 
    $no=0;
    $query = "SELECT * FROM tb_kategori";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)) {
    $no++;
        
        echo "<tr align = center >";
        echo "<td>".$no."</td>";
        echo "<td>".$row['nama_kt']."</td>";
        echo "<td>".$row['keterangan']."</td>";
        if($super_user == true){ 

        echo"<td> <a href='editkt.php?id=$row[id]'>edit </a> | <a href='hapuskt.php?id=$row[id]'>Delete </a></td>";
             } 
        // echo "<td>".$row['keterangan']."</td>";
        echo "</tr>";
        } ?>
    </table>
    <div align="center"><br>
    <a href="tambahkt.php" align="center"><button>Tambah Kategori</button></a>
    </div>
</div>