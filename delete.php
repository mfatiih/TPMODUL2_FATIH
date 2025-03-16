<?php
include 'connect.php';

// Mengecek apakah terdapat parameter GET 'id' di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Menyusun perintah SQL menggunakan prepared statement
        $query = "DELETE FROM tb_buku WHERE id = :id";
        $stmt = $conn->prepare($query);
        
        // Bind parameter
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        // Eksekusi query
        $stmt->execute();

        // Mengecek apakah ada baris yang terpengaruh
        if ($stmt->rowCount() > 0) {
            header("Location: katalog_buku.php");
            exit();
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>