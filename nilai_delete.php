<?php
include "koneksi.php";

// Validasi: pastikan parameter 'id' ada di URL
if(!isset($_GET['id'])){
    die("Error: ID tidak ditemukan");
}

$id = $_GET['id'];

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("DELETE FROM matrik_keputusan WHERE id = ?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location='matrik_keputusan.php';
    </script>";
} else {
    die("Error: " . $stmt->error);
}

$stmt->close();
?>
