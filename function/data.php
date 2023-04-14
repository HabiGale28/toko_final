<?php

function tambah_data_kt($nama,$ket){
    global $link;

    $query = "INSERT INTO tb_kategori (nama_kt, keterangan) VALUES ('$nama','$ket')";
    $result = mysqli_query($link, $query) or die('gagal');

    return $result;
}

function tambah_data($kategori, $nama, $img, $harga, $jumlah){
    global $link;

    $query = "INSERT INTO tb_barang (id_kategori, nama, gambar, harga, jumlah) VALUES ('$kategori', '$nama', '$img', '$harga', '$jumlah')";
    $result = mysqli_query($link, $query) or die('gagal');

    return $result;

}

function edit_data($kategori, $nama, $img, $harga, $jumlah, $id){
    global $link;

    $query = "UPDATE tb_barang SET id_kategori='$kategori', nama='$nama', gambar='$img', harga='$harga', jumlah='$jumlah'
              WHERE id_barang=$id";
    $result = mysqli_query($link, $query) or die('gagal');

    return $result;
}
function edit_data_kt($nama, $keterangan, $id){
    global $link;

    $query = "UPDATE tb_kategori SET nama_kt='$nama', keterangan='$keterangan'
              WHERE id=$id";
    $result = mysqli_query($link, $query) or die('gagal');

    return $result;
}

function tampilkan_per_id($id){
    global $link;

    $query  = "SELECT * FROM tb_barang WHERE id_barang=$id";
    $result = mysqli_query($link, $query) or die('gagal menampilkan data');

    return $result;
}
function tampilkan_pe_id($id){
    global $link;

    $query  = "SELECT * FROM tb_kategori WHERE id=$id";
    $result = mysqli_query($link, $query) or die('gagal menampilkan data');

    return $result;
}
function hapus_data($id){
    global $link;

    $query = "DELETE FROM tb_barang WHERE id_barang=$id";
    $result = mysqli_query($link, $query) or die ('gagal menghapus data');

    return $result;
}
function hapus_data_kt($id){
    global $link;

    $query = "DELETE FROM tb_kategori WHERE id=$id";
    $result = mysqli_query($link, $query) or die ('gagal menghapus data');

    return $result;
}

?>