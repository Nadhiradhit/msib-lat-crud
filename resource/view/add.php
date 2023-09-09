<?php

include "connect.php";

if(isset($_POST['submit'])){
    $name = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $grade = $_POST['grade'];
    $nilai = $_POST['nilai'];

    $result = mysqli_query($db,"INSERT INTO nilai (nama,matkul,grade,nilai) VALUES ('$name','$matkul','$grade','$nilai')");
   
    echo "Berhasil menambah user. <a href='index.php'>Lihat User</a>";

}


?>