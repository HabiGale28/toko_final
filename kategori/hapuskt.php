<?php
require_once "../core/init.php";


if(isset($_GET['id'])){
    if(hapus_data_kt($_GET['id'])){
        header(('Location: kategori.php'));
}
    else echo 'gagal menghapus data';
}