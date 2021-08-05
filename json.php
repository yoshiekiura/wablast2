<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(get("id")){
    $id = get("id");
    $q = mysqli_query($koneksi, "SELECT * FROM groups WHERE id='$id'");

    $row = mysqli_fetch_assoc($q);
    header('Content-Type: application/json');
    echo json_encode(unserialize($row['anggota']), JSON_FORCE_OBJECT);
}

?>