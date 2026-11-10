<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Alternatif - TOPSIS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background: #eef3f8; font-family: 'Segoe UI'; }
        .page-title { font-size: 30px; font-weight: 700; text-align:center; margin:20px; color:#1e3d59; }
        .card-custom { padding:25px; border-radius:12px; background:white; box-shadow:0 4px 10px rgba(0,0,0,0.1); }
        .btn-custom { background:#1e88e5; color:white; border:none; padding:10px 20px; border-radius:8px; }
        .btn-custom:hover { background:#0d6efd; }
        .btn-add { background:#43a047; color:white; border:none; padding:5px 12px; border-radius:6px; }
        .btn-add:hover { background:#2e7d32; }
    </style>

    <script>
    // Tambah input kriteria secara dinamis
    function tambahKriteria() {
        let container = document.getElementById("kriteria-container");

        let html = `
            <div class="mb-3 kriteria-item">
                <label class="form-label">Kriteria</label>
                <input type="text" name="nama_kriteria[]" class="form-control" required>
            </div>
        `;

        container.insertAdjacentHTML("beforeend", html);
    }
    </script>


   <script>
    // Hapus input kriteria secara dinamis
    function hapusKriteria() {
        let container = document.getElementById("kriteria-container");
        let items = container.querySelectorAll(".kriteria-item");
        if (items.length > 1) {
            items[items.length - 1].remove();
        }
    }
    </script>

</head>

<body>

<div class="container col-md-6">

    <div class="page-title">
        <i class="fa-solid fa-list-check"></i> Input Alternatif
    </div>

    <div class="card card-custom">

        <form method="post">

            <h5><b>Daftar Kriteria</b></h5>

            <!-- Container untuk Kriteria -->
            <div id="kriteria-container">

                <!-- Kriteria default -->
                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 1</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja" selected>Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>

                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 2</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika" selected>Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>

                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 3</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi" selected>Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>

                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 4</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif" selected>Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>


                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 5</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas" selected>Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>


                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 6</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab" selected>Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>


                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 7</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin" selected>Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>
        
                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 8</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran" selected>Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>
    
                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 9</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan" selected>Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan">Menjaga Aset Perusahaan</option>
                    </select>
                </div>

                <div class="mb-3 kriteria-item">
                    <label class="form-label">Kriteria 10</label>
                    <select name="nama_kriteria[]" class="form-select" required>
                        <option value="">-- Pilih Kriteria --</option>
                        <option value="Prestasi Kerja">Prestasi Kerja</option>
                        <option value="Sikap dan Etika">Sikap dan Etika</option>
                        <option value="Motivasi">Motivasi</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Loyalitas">Loyalitas</option>
                        <option value="Tanggung Jawab">Tanggung Jawab</option>
                        <option value="Disiplin">Disiplin</option>
                        <option value="Kejujuran">Kejujuran</option>
                        <option value="Kepemimpinan">Kepemimpinan</option>
                        <option value="Menjaga Aset Perusahaan" selected>Menjaga Aset Perusahaan</option>
                    </select>
                </div>
            </div>


            <!-- Tombol Tambah -->
            <button type="button" class="btn-add mb-3" onclick="tambahKriteria()">
                <i class="fa-solid fa-plus"></i> Tambah Kriteria
            </button>
            <button type="button" class="btn-add mb-3" onclick="hapusKriteria()">
                <i class="fa-solid fa-minus"></i> Hapus Kriteria
            </button>

            <hr>

            <h5><b>Pilih Alternatif</b></h5>

            <!-- Pilihan Alternatif -->
            <div class="mb-3">
                <label class="form-label">Alternatif</label>
                <select name="alternatif" class="form-select" required>
                    <option value="">-- Pilih Alternatif --</option>
                    <option value="A1">A1 – Sutrisno</option>
                    <option value="A2">A2 – M.Ahyar</option>
                    <option value="A3">A3 – Lamidi</option>
                    <option value="A4">A4 – Sabar</option>
                    <option value="A5">A5 – Iskandar</option>
                </select>
            </div>

            <!-- Tombol -->
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

    $alt   = $_POST['alternatif'];
    $kriteria = $_POST['nama_kriteria'];  // ← ARRAY KRITERIA

    // SIMPAN SEMUA KRITERIA (LOOP)
    foreach ($kriteria as $kr) {
        mysqli_query($koneksi,
            "INSERT INTO kriteria (nama_kriteria)
             VALUES ('$kr')"
        );
    }

    // Tentukan Nama Alternatif
    $nama_alt = ($alt == "A1") ? "Sutrisno" :
                    (($alt == "A2") ? "M.Ahyar" :
                (($alt == "A3") ? "Lamidi" :
                (($alt == "A4") ? "Sabar" : "Iskandar")));

    // CEK ALTERNATIF
    $cek = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE kode='$alt'");

    if (mysqli_num_rows($cek) == 0) {
        mysqli_query($koneksi,
            "INSERT INTO alternatif (kode, nama_alternatif)
             VALUES ('$alt', '$nama_alt')"
        );
    }

    echo "<script>
            alert('Data berhasil disimpan!');
            window.location='matrik_keputusan.php';
          </script>";
}
?>
