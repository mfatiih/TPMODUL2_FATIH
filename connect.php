<?php
// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
// 1. data host
$host = "localhost";
// 2. data username
$username = "root";
// 3. data password
$password = "";
// 4. database
$database = "db_perpustakaan";
// 5.port
$port = 3306;
// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 
$conn = new mysqli($host, $username, $password, $database , $port);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>