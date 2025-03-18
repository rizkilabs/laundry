<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "angkatan_1_laundry"; 

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil!";
?>