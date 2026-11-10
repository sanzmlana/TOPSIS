<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Nilai Kriteria - TOPSIS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background: #eef3f8; font-family: 'Segoe UI'; }
        .page-title { font-size: 30px; font-weight: 700; text-align:center; margin:20px; color:#1e3d59; }
        .card-custom { padding:25px; border-radius:12px; background:white; box-shadow:0 4px 10px rgba(0,0,0,0.1); }
        .btn-custom { background:#1e88e5; color:white; border:none; padding:10px 20px; border-radius:8px; }
        .btn-custom:hover { background:#0d6efd; }
    </style>
</head>

<body>

<div class="container col-md-6">

    <div class="page-title">
        <i class="fa-solid fa-list-check"></i> Input Kriteria
    </div>

    <div class="card card-custom">

        <form method="post">

            <h5><b>Nilai Kriteria</b></h5>
            
            <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 1 (Prestasi Kerja)</label>
                    <select name="k1" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Target Kinerja Tercapai >100%</option>
                        <option value="4">4.Target Kinerja Tercapai 91-100%</option>
                        <option value="3">3.Target Kinerja Tercapai 81-90%</option>
                        <option value="2">2.Target Kinerja Tercapai 71-80%</option>
                        <option value="1">1.Target Kinerja Tercapai 70%</option>
                        <option value="">-</option>
                    </select>
                </div>

            <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 2 (Sikap dan Etika)</label>
                    <select name="k2" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Hormat kepada atasan, berpenampilan rapi dan sopan </option>
                        <option value="4">4.Bisa Menghargai atasan, penampilan sopan, bersikap baik</option>
                        <option value="3">3.Bisa Menghargai atasan, penampilan kurang sopan </option>
                        <option value="2">2.kurang menghargai atasan, penampilan kurang sopan </option>
                        <option value="1">1.tidak bisa menempatkan diri, tidak bisa menghargai atasan </option>
                        <option value="">-</option>
                    </select>
                </div>

            <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 3 (Motivasi)</label>
                    <select name="k3" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Semangat dalam bekerja, berusaha untuk meraih prestasi  </option>
                        <option value="4">4.berusaha untuk maju namun kurang usaha untuk mengembangkan diri </option>
                        <option value="3">3.Bekerja biasa-biasa saja  </option>
                        <option value="2">2.Kurang semangat dalam bekerja  </option>
                        <option value="1">1.Bekerja tidak semangat  </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 4 (Inisiatif)</label>
                    <select name="k4" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Suka memunculkan ide-ide untuk mengatasi permasalahan</option>
                        <option value="4">4.Mempunyai kemauan untuk mencari cara mengatasi permasalahan dan mau berusaha untuk menjadi yang lebih baik  </option>
                        <option value="3">3.Kurang mempunyai kemauan untuk mencari cara mengatasi masalah </option>
                        <option value="2">2.Tidak mau berusaha untuk mengatasi permasalahan</option>
                        <option value="1">1.Tidak perduli keadaan, bersikap masa bodo </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 5 (Loyalitas)</label>
                    <select name="k5" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Suka memunculkan ide-ide untuk mengatasi permasalahan </option>
                        <option value="4">4.Mempunyai kemauan untuk mencari cara mengatasi permasalahan dan mau berusaha untuk menjadi yang lebih baik  </option>
                        <option value="3">3.Kurang mempunyai kemauan untuk mencari cara mengatasi masalah </option>
                        <option value="2">2.Tidak mau berusaha untuk mengatasi permasalahan</option>
                        <option value="1">1.Tidak perduli keadaan, bersikap masa bodo </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 6 (Tanggung Jawab)</label>
                    <select name="k6" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Selalu menjalankan tugasnya dengan senang hati</option>
                        <option value="4">4.senang menjalankan tugasnya namun kurang berani dalam mengambil resiko </option>
                        <option value="3">3.menjalankan tugasnya tetapi suka menghindar dari permaalahan  </option>
                        <option value="2">2.Sering menghindar dari tugas yang menjadi kewajibannya </option>
                        <option value="1">1.Sering meninggalkan tugas dan lalai dalam menjalankan tugas-tugasnya</option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 7 (Disiplin)</label>
                    <select name="k7" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.masuk dan pulang kerja tepat waktu </option>
                        <option value="4">4.sesekali terlambat masuk kerja </option>
                        <option value="3">3.sesekali terlambat masuk kerja dan melanggar peraturan perusahaan </option>
                        <option value="2">2.Sering melanggar peraturan perusahaan, melanggar instruksi atasan, dan sering terlambat masuk kerja  </option>
                        <option value="1">1.lambat masuk kerja, tidak patuh pada peraturan perusahaan </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 8 (Kejujuran)</label>
                    <select name="k8" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Kejujuran merupakan identitas pribadinya</option>
                        <option value="4">4.bersikap terus terang, jujur, tidak memihak, berani mengakui kesalahan </option>
                        <option value="3">3.kurang bisa bersikap terus terang </option>
                        <option value="2">2.Bersikap tidak terus terang </option>
                        <option value="1">1.suka berbohong, bersikap memihak secara subjektif </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 9 (Kepemimpinan)</label>
                    <select name="k9" class="form-control" >
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.selalu memberikan perhatian, pembinaan terhadap perkembangan kinerja tim </option>
                        <option value="4">4.Memberikan perhatian kepada bawahan sehingga kerjasama tim dapat berjalan dengan baik </option>
                        <option value="3">3.Kurang memberi perhatian terhadap peningkatan kecakapan bawahan </option>
                        <option value="2">2.Kurang sekali melakukan bimbingan/pengarahan terhadap bawahan </option>
                        <option value="1">1.Tidak pernah melakukan pembinaan. Pengarahan terhadap bawahan </option>
                        <option value="">-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Kriteria 10 (Menjaga Aset Perusahaan)</label>
                    <select name="k10" class="form-control" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="5">5.Menggunakan barang atau aset milik perusahaan dengan benar </option>
                        <option value="4">4.punya keperdulian terhadap keamanan dan kesalamatan aset-aset milik perusahaan  </option>
                        <option value="3">3.tetapi kurang peduli terhadap keamanan dan keselamatan aset-aset milik perusahaan </option>
                        <option value="2">2.Kurang benar dalam menggunakan aset </option>
                        <option value="1">1.Menggunakan barang milik perusahaaan secara sembarangan </option>
                        <option value="">-</option>
                    </select>
                </div>

            <hr>

            <h5><b>Pilih Alternatif</b></h5>

            <div class="mb-3">
                <select name="alternatif" class="form-select" required>
                    <option value="">-- Pilih Alternatif --</option>
                    <option value="A1">A1 – Sutrisno</option>
                    <option value="A2">A2 – M.Ahyar</option>
                    <option value="A3">A3 – Lamidi</option>
                    <option value="A4">A4 – Sabar</option>
                    <option value="A5">A5 – Iskandar</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" name="simpan" class="btn-custom">
                    <i class="fa-solid fa-save"></i> Simpan Data
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>
<?php
if (isset($_POST['simpan'])) {
    $alt = $_POST['alternatif'];

    // Fungsi internal untuk menangani konversi string kosong ke keyword NULL SQL
    function siapkan_nilai($data) {
        // Jika data kosong, kembalikan keyword NULL tanpa tanda petik
        if ($data === "") {
            return "NULL";
        }
        // Jika ada data, kembalikan nilai dengan bungkus tanda petik agar aman bagi SQL
        return "'" . $data . "'";
    }

    // Proses semua kriteria agar seragam dan aman
    $k1  = siapkan_nilai($_POST['k1']);
    $k2  = siapkan_nilai($_POST['k2']);
    $k3  = siapkan_nilai($_POST['k3']);
    $k4  = siapkan_nilai($_POST['k4']);
    $k5  = siapkan_nilai($_POST['k5']);
    $k6  = siapkan_nilai($_POST['k6']);
    $k7  = siapkan_nilai($_POST['k7']);
    $k8  = siapkan_nilai($_POST['k8']);
    $k9  = siapkan_nilai($_POST['k9']);
    $k10 = siapkan_nilai($_POST['k10']);

    // EKSEKUSI QUERY
    // PERHATIKAN: Variabel k1 sampai k10 TIDAK boleh dibungkus tanda petik lagi di sini
    $query = "INSERT INTO matrik_keputusan (kode_alternatif, k1, k2, k3, k4, k5, k6, k7, k8, k9, k10)
              VALUES ('$alt', $k1, $k2, $k3, $k4, $k5, $k6, $k7, $k8, $k9, $k10)";

    $simpan_data = mysqli_query($koneksi, $query);

    if ($simpan_data) {
        echo "<script>
                alert('Data berhasil disimpan!');
                window.location='matrik_keputusan.php';
              </script>";
    } else {
        // Menampilkan error jika query gagal untuk mempermudah debugging
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>