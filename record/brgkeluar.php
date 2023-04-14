<?php

require_once "../core/init.php";


require_once "../view/header.php";

$query = mysqli_query($link, "SELECT * FROM tb_transaksi_keluar INNER JOIN tb_barang ON tb_transaksi_keluar.id_barang = tb_barang.id" );
$i = 1;
?>
<h2 align="center">Barang Keluar</h2>


<table border="1px" align="center" width="600px">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Pengguna</th>
        <th>Tanggal</th>
    </tr>
    <?php 
    while($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['tgl'] ?></td>
    </tr>
    <?php } ?>
</table>
<div align="center"><br>
<a href="tbrgmasuk.php"><Button>Tambah</Button></a>
</div>
