<?php
include "koneksi.php";

// Validasi: pastikan parameter 'id' ada di URL
if(!isset($_GET['id'])){
    die("Error: ID tidak ditemukan");
}

$id = $_GET['id'];

// Gunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("SELECT * FROM matrik_keputusan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result();

if($data->num_rows == 0){
    die("Error: Data tidak ditemukan");
}
$nilai = $data->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai</title>
</head>
<body>

<h2>Edit Nilai Alternatif</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $nilai['id'] ?>">

    C1: <input type="text" name="k1" value="<?= $nilai['k1'] ?>"><br><br>
    C2: <input type="text" name="k2" value="<?= $nilai['k2'] ?>"><br><br>
    C3: <input type="text" name="k3" value="<?= $nilai['k3'] ?>"><br><br>
    C4: <input type="text" name="k4" value="<?= $nilai['k4'] ?>"><br><br>
    C5: <input type="text" name="k5" value="<?= $nilai['k5'] ?>"><br><br>
    C6: <input type="text" name="k6" value="<?= $nilai['k6'] ?>"><br><br>
    C7: <input type="text" name="k7" value="<?= $nilai['k7'] ?>"><br><br>
    C8: <input type="text" name="k8" value="<?= $nilai['k8'] ?>"><br><br>
    C9: <input type="text" name="k9" value="<?= $nilai['k9'] ?>"><br><br>
    C10: <input type="text" name="k10" value="<?= $nilai['k10'] ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>

<?php
if (isset($_POST['update'])) {

    $id  = $_POST['id'];
    $k1  = $_POST['k1'];
    $k2  = $_POST['k2'];
    $k3  = $_POST['k3'];
    $k4  = $_POST['k4'];
    $k5  = $_POST['k5'];
    $k6  = $_POST['k6'];
    $k7  = $_POST['k7'];
    $k8  = $_POST['k8'];
    $k9  = $_POST['k9'];
    $k10 = $_POST['k10'];

    //query update menggunakan prepared statement
    $stmt = $koneksi->prepare(
        "UPDATE matrik_keputusan SET 
            k1=?, k2=?, k3=?, k4=?, k5=?, k6=?, k7=?, k8=?, k9=?, k10=?
         WHERE id=?"
    );
    $stmt->bind_param("dddddddddi", $k1, $k2, $k3, $k4, $k5, $k6, $k7, $k8, $k9, $k10, $id);
    
    if($stmt->execute()){
        echo "<script>alert('Data berhasil diperbarui'); window.location='matrik_keputusan.php';</script>";
    } else {
        die("Error: " . $stmt->error);
    }
    $stmt->close();
}
?>
