<?php

function register_user($nama, $pass, $nm_lengkap){

    global $link;

    //mencegah sql injection
    $nama = escape($nama);
    $pass = escape($pass);
    $nm_lengkap = escape($nm_lengkap);

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (username, password, nm_lengkap) VALUE ('$nama','$pass', 'nm_lengkap')";

    if(mysqli_query($link, $query))return true; 
    else return false;
}

function cek_nama($nama){
    global $link;

    //mencegah sql injection
    $nama = escape($nama);

    $query = "SELECT * FROM user WHERE username = '$nama'";

    if($result = mysqli_query($link, $query))return mysqli_num_rows($result);
}


//Untuk Login
function cek_data($nama, $pass, $nm_lengkap){
    global $link;

    //mencegah sql injection
    $nama = escape($nama);
    $pass = escape($pass);
    $nm_lengkap = escape($nm_lengkap);

    $query = "SELECT password FROM user WHERE username = '$nama'";
    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result)['password'];


    if( password_verify($pass, $hash)) return true;
    else return false;
}

//mencegah injection
function escape($data){
    global $link;
    return mysqli_real_escape_string($link, $data);
}

function redirect_login($nama){
    $_SESSION['user'] = $nama;
    header('Location: index.php');
}

function flash_delete($name){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
}

function cek_admin($nama){
    global $link;
    $nama = escape($nama);

    $query = "SELECT role from user WHERE username = '$nama'";

    $result = mysqli_query($link, $query);
    $status = mysqli_fetch_assoc($result)['role'];

    if($status == 1) return true;
    else return false;

    return $status;
}
?>