<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM alternatif");
mysqli_query($koneksi, "DELETE FROM matrik_keputusan");
mysqli_query($koneksi, "DELETE FROM kriteria");

echo "<script>
    alert('Data berhasil dihapus!');
    window.location='matrik_keputusan.php';
</script>";
?>
