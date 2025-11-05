<?php
$host = "localhost";     
$user = "root";          
$pass = "";              
$dbname = "sekolah_2";   


$conn = mysqli_connect($host, $user, $pass, $dbname);


if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8");

?>
