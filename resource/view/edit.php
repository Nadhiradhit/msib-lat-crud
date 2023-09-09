<?php

include "connect.php";


if(isset($_POST['simpan'])){

  
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $grade = $_POST['grade'];
    $nilai = $_POST['nilai'];


   
    $sql = "UPDATE nilai SET nama='$nama', matkul='$matkul', grade='$grade', nilai='$nilai' WHERE id=$id";
    $query = mysqli_query($db, $sql);

   
    if( $query ) {
       
        header('Location: index.php');
    } else {
       
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>