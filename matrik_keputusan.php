<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matriks Keputusan - TOPSIS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#eef3f8; font-family:'Segoe UI'; }
        .title { font-size:28px; font-weight:700; text-align:center; margin:25px; }
        .btn-add { background:#2e7d32; color:white; padding:8px 15px; border-radius:6px; border:none; }
        .btn-add:hover { background:#1b5e20; }
        .btn-normalisasi { background:#0d6efd; color:white; padding:8px 15px; border-radius:6px; border:none; margin-left:10px; }
        .btn-normalisasi:hover { background:#0b5ed7; }
        table { background:white; }
    </style>
</head>

<body>

<div class="container">

    <div class="title">Tabel Matriks Keputusan</div>

    <!-- Tombol tambah alternatif/kriteria -->
    <a href="input_kriteria.php" class="btn-add mb-3">Tambah Alternatif / Kriteria</a>
    
    <!-- Tombol ke normalisasi -->
    <a href="normalisasi.php" class="btn-normalisasi mb-3">Hitung Normalisasi / TOPSIS</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Alternatif</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
                <th>C7</th>
                <th>C8</th>
                <th>C9</th>
                <th>C10</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $alternatif = mysqli_query($koneksi, "SELECT * FROM alternatif ORDER BY kode");

        while ($row = mysqli_fetch_assoc($alternatif)) {

            $kode = $row['kode'];

            $nilai = mysqli_query($koneksi,
                "SELECT * FROM matrik_keputusan WHERE kode_alternatif='$kode' ORDER BY id DESC LIMIT 1"
            );

            if (mysqli_num_rows($nilai) == 0) {
                echo "
                <tr>
                    <td>{$row['nama_alternatif']}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <a href='input_kriteria.php?kode=$kode' class='btn btn-sm btn-primary'>Input</a>
                    </td>
                </tr>";
            } else {
                $n = mysqli_fetch_assoc($nilai);
                echo "
                <tr>
                    <td>{$row['nama_alternatif']}</td>
                    <td>{$n['k1']}</td>
                    <td>{$n['k2']}</td>
                    <td>{$n['k3']}</td>
                    <td>{$n['k4']}</td>
                    <td>{$n['k5']}</td>
                    <td>{$n['k6']}</td>
                    <td>{$n['k7']}</td>
                    <td>{$n['k8']}</td>
                    <td>{$n['k9']}</td>
                    <td>{$n['k10']}</td>
                    <td>
                        <a href='nilai_edit.php?id={$n['id']}' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='nilai_delete.php?id={$n['id']}' class='btn btn-sm btn-danger'
                           onclick=\"return confirm('Hapus data ini?')\">Delete</a>
                    </td>
                </tr>";
            }
        }
        ?>
        </tbody>
    </table>

</div>

</body>
</html>
