<?php
include 'connect.php';

// Mengecek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"] ?? "";
    $penulis = $_POST["penulis"] ?? "";
    $tahun_terbit = $_POST["tahun_terbit"] ?? "";

    try {
        // Menyusun perintah SQL menggunakan prepared statement
        $sql = "INSERT INTO tb_buku (judul, penulis, tahun_terbit) VALUES (:judul, :penulis, :tahun_terbit)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameter
        $stmt->bindParam(":judul", $judul);
        $stmt->bindParam(":penulis", $penulis);
        $stmt->bindParam(":tahun_terbit", $tahun_terbit);
        
        // Eksekusi query
        if ($stmt->execute()) {
            header("Location: katalog.php");
            exit();
        } else {
            echo "<script>alert('Gagal menambahkan data');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>