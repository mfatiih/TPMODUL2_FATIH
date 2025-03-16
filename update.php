<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
include 'connect.php';

// Periksa apakah tombol update diklik
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_GET['id']; // Ambil ID dari parameter URL
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    try {
        // Query untuk mengupdate data buku berdasarkan ID
        $query = "UPDATE tb_buku SET judul = :judul, penulis = :penulis, tahun_terbit = :tahun_terbit WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(":judul", $judul);
        $stmt->bindParam(":penulis", $penulis);
        $stmt->bindParam(":tahun_terbit", $tahun_terbit);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Eksekusi query
        if ($stmt->execute()) {
            header("Location: katalog_buku.php"); // Redirect ke halaman katalog
            exit();
        } else {
            echo "<script>alert('Data gagal diperbarui');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

