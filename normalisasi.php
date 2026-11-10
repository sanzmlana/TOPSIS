<?php
// ============================================================
// FILE: normalisasi.php
// TUJUAN: Menampilkan proses normalisasi TOPSIS lengkap
// ============================================================

// Enable error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include file koneksi database
include __DIR__ . "/koneksi.php";

// ============================================================
// STEP 1: Ambil data dari database
// ============================================================
// Query mengambil data alternatif dan nilai kriteria dari matrik keputusan
$sql = "
    SELECT alternatif.kode, alternatif.nama_alternatif,
           matrik_keputusan.k1, matrik_keputusan.k2, matrik_keputusan.k3, matrik_keputusan.k4, matrik_keputusan.k5, matrik_keputusan.k6, matrik_keputusan.k7, matrik_keputusan.k8, matrik_keputusan.k9, matrik_keputusan.k10
    FROM alternatif
    JOIN matrik_keputusan
      ON alternatif.kode = matrik_keputusan.kode_alternatif
";
$query = mysqli_query($koneksi, $sql);

// Simpan hasil query ke dalam array $data
$data = [];
while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

// ============================================================
// STEP 2: Hitung √(Σx²) untuk tiap kriteria
// ============================================================
// Inisialisasi array pembagi dengan 5 kriteria
$pembagi = ['k1'=>0,'k2'=>0,'k3'=>0,'k4'=>0,'k5'=>0,'k6'=>0,'k7'=>0,'k8'=>0,'k9'=>0,'k10'=>0];

// Loop 1: Hitung jumlah kuadrat setiap kriteria (Σx²)
foreach($data as $d){
    foreach($pembagi as $k=>$v){
        // Tambahkan nilai kuadrat untuk setiap kriteria
        $pembagi[$k] += pow($d[$k],2);
    }
}

// Loop 2: Hitung akar kuadrat dari jumlah kuadrat (√Σx²)
foreach($pembagi as $k=>$v){
    $pembagi[$k] = sqrt($v);
}

// ============================================================
// STEP 3: Hitung Matriks Normalisasi R
// ============================================================
// Rumus: R[i][j] = nilai[i][j] / √(Σx²)[j]
$R = [];
foreach($data as $i=>$d){
    foreach($pembagi as $k=>$v){
        // Bagi setiap nilai dengan pembagi (akar kuadrat)
        // Cegah pembagian dengan nol
        if($v != 0){
            $R[$i][$k] = round($d[$k]/$v, 3);
        } else {
            $R[$i][$k] = 0;
        }
    }
}

// ============================================================
// STEP 4: Hitung Matriks V (Ternormalisasi Terbobot)
// ============================================================
// Bobot kriteria ditentukan berdasarkan pentingnya setiap kriteria
$W = ['k1'=>0.15,'k2'=>0.1,'k3'=>0.1,'k4'=>0.15,'k5'=>0.1,'k6'=>0.15,'k7'=>0.1,'k8'=>0.1,'k9'=>0,'k10'=>0.05]; // Bobot setiap kriteria

// Kalikan matriks R dengan bobot untuk mendapatkan matriks V
$V = [];
foreach($R as $i=>$r){
    foreach($W as $k=>$w){
        // Rumus: V[i][j] = R[i][j] × W[j]
        $V[$i][$k] = round($r[$k]*$w,3);
    }
}

// ============================================================
// STEP 5: Tentukan Matriks Ideal Positif (A+) dan Negatif (A-)
// ============================================================
// A+ adalah nilai maksimal setiap kriteria dari matriks V
// A- adalah nilai minimal setiap kriteria dari matriks V
$A_plus = [];   // Solusi ideal positif
$A_minus = [];  // Solusi ideal negatif

foreach($W as $k=>$w){
    // Ambil kolom kriteria dari matriks V
    $col = array_column($V,$k);
    
    // A+ adalah nilai maksimal
    $A_plus[$k] = max($col);
    
    // A- adalah nilai minimal
    $A_minus[$k] = min($col);
}

// ============================================================
// STEP 6: Hitung Jarak ke Solusi Ideal (D+ dan D-)
// ============================================================
// D+ adalah jarak Euclidean ke solusi ideal positif
// D- adalah jarak Euclidean ke solusi ideal negatif
$D_plus = [];   // Jarak ke solusi ideal positif
$D_minus = [];  // Jarak ke solusi ideal negatif

foreach($V as $i=>$v){
    $sum_plus = 0;   // Akumulator untuk D+
    $sum_minus = 0;  // Akumulator untuk D-
    
    // Hitung selisih kuadrat untuk setiap kriteria
    foreach($W as $k=>$w){
        // Rumus D+: √(Σ(V[i][j] - A+[j])²)
        $sum_plus += pow($v[$k] - $A_plus[$k],2);
        
        // Rumus D-: √(Σ(V[i][j] - A-[j])²)
        $sum_minus += pow($v[$k] - $A_minus[$k],2);
    }
    
    // Ambil akar kuadrat dan simpan hasilnya
    $D_plus[$i] = round(sqrt($sum_plus),3);
    $D_minus[$i] = round(sqrt($sum_minus),3);
}

// ============================================================
// STEP 7: Hitung Nilai Preferensi (C) dan Ranking
// ============================================================
// C adalah nilai yang menunjukkan seberapa dekat alternatif dengan solusi ideal
// Rumus: C[i] = D-[i] / (D+[i] + D-[i])
// Nilai C berkisar 0-1, semakin tinggi semakin baik
$C = [];
foreach($data as $i=>$d){
    if($D_plus[$i] + $D_minus[$i] > 0){
        $C[$i] = round($D_minus[$i]/($D_plus[$i]+$D_minus[$i]),3);
    } else {
        $C[$i] = 0;
    }
}

// Lakukan sorting dari nilai preferensi terbesar ke terkecil untuk mendapat ranking
$ranking = $C;
arsort($ranking); // Urutkan dari nilai tertinggi ke terendah
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Meta Tags: Informasi dasar dokumen HTML -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>METODE TOPSIS - Proses Normalisasi</title>
  
  <!-- Bootstrap CSS: Framework CSS untuk styling responsif -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome: Icon library untuk ikon visual -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  
  <!-- Custom CSS: Styling khusus sesuai desain -->
  <style>
    /* ===== CSS VARIABLES: Warna-warna utama yang dapat diubah ===== */
    :root {
      --primary-color: #0d6efd;           /* Warna biru untuk elemen utama */
      --secondary-color: #6c757d;         /* Warna abu-abu untuk elemen sekunder */
      --success-color: #198754;           /* Warna hijau untuk status sukses */
      --danger-color: #dc3545;            /* Warna merah untuk peringatan */
      --light-bg: #f8f9fa;                /* Warna abu-abu terang untuk background */
    }

    /* ===== BODY: Styling keseluruhan halaman ===== */
    body {
      /* Gradient background: biru ke ungu */
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* ===== NAVBAR: Styling navigation bar ===== */
    .navbar-custom {
      background: rgba(255, 255, 255, 0.98);  /* Putih semi-transparan */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    /* ===== HEADER SECTION: Bagian judul halaman ===== */
    .header-section {
      background: linear-gradient(135deg, rgba(13, 110, 253, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
      color: white;
      padding: 40px 0;
      margin-bottom: 40px;
      border-radius: 0 0 15px 15px;
    }

    .header-section h1 {
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .header-section p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    /* ===== CONTAINER MAIN: Wrapper utama konten ===== */
    .container-main {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      margin: 0 auto 40px;
      max-width: 1200px;
    }

    /* ===== SECTION TITLE: Judul untuk setiap bagian ===== */
    .section-title {
      font-weight: 600;
      color: #333;
      margin: 30px 0 20px 0;
      padding-bottom: 15px;
      border-bottom: 3px solid var(--primary-color);
      font-size: 1.3rem;
    }

    /* ===== TABLE STYLING: Styling untuk tabel data ===== */
    .table {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
    }

    .table thead {
      background: linear-gradient(135deg, var(--primary-color) 0%, #0a58ca 100%);
      color: white;
    }

    .table thead th {
      border: none;
      padding: 15px;
      font-weight: 600;
      vertical-align: middle;
    }

    .table tbody td {
      padding: 12px 15px;
      border-color: #e9ecef;
      vertical-align: middle;
    }

    /* Warna alternatif untuk baris (striped) */
    .table tbody tr:nth-child(odd) {
      background-color: #f8f9fa;
    }

    /* Hover effect pada baris tabel */
    .table tbody tr:hover {
      background-color: #e7f3ff;
      transition: background-color 0.3s ease;
    }

    /* ===== TABLE DARK: Styling untuk header tabel gelap ===== */
    .table-dark {
      background-color: var(--secondary-color) !important;
    }

    .table-dark th {
      color: white;
      border-color: #495057;
    }

    /* ===== BUTTON STYLING: Styling untuk tombol aksi ===== */
    .btn-action {
      border-radius: 6px;
      font-weight: 500;
      transition: all 0.3s ease;
      padding: 10px 20px;
    }

    .btn-action:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* ===== DIVIDER: Garis pemisah antar bagian ===== */
    .divider {
      height: 2px;
      background: linear-gradient(to right, transparent, var(--primary-color), transparent);
      margin: 40px 0;
    }

    /* ===== FOOTER SECTION: Bagian footer halaman ===== */
    .footer-section {
      text-align: center;
      padding: 20px;
      color: white;
      font-size: 0.9rem;
    }

    /* ===== BADGE STYLING: Styling untuk badge/label ===== */
    .badge-rank {
      font-size: 0.9rem;
      padding: 5px 10px;
      border-radius: 20px;
    }

    .badge-rank-1 {
      background-color: #ffc107;
      color: #333;
    }

    .badge-rank-2 {
      background-color: #c0c0c0;
      color: #333;
    }

    .badge-rank-3 {
      background-color: #cd7f32;
      color: white;
    }

    /* ===== ANIMATION: Animasi fade-in saat halaman dimuat ===== */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .table {
      animation: fadeIn 0.6s ease-in-out;
    }

    /* ===== PRINT STYLE: Styling khusus untuk print ===== */
    @media print {
      body {
        background: white;
      }
      .navbar-custom,
      .header-section,
      .footer-section,
      .btn-print {
        display: none;
      }
      .container-main {
        box-shadow: none;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- ===== NAVBAR: Navigation Bar ===== -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
      <!-- Logo/Brand -->
      <a class="navbar-brand fw-bold text-primary" href="index.php">
        <i class="fas fa-chart-line"></i> TOPSIS
      </a>
      <!-- Navigation Links -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="normalisasi.php"><i class="fas fa-calculator"></i> Normalisasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== HEADER SECTION: Judul dan Deskripsi Halaman ===== -->
  <div class="header-section">
    <div class="container">
      <h1><i class="fas fa-balance-scale"></i> Proses Normalisasi TOPSIS</h1>
      <p>Lihat perhitungan lengkap normalisasi dan ranking alternatif menggunakan metode TOPSIS</p>
    </div>
  </div>

  <!-- ===== MAIN CONTAINER: Konten Utama ===== -->
  <div class="container-main">

    <!-- ===== STEP 1: √(Σx²) ===== -->
    <h2 class="section-title">
      <i class="fas fa-calculator"></i> Step 1: Hitung √(Σx²) untuk Setiap Kriteria
    </h2>
    <p class="text-muted">Langkah pertama normalisasi: menghitung akar dari jumlah kuadrat setiap kriteria.</p>
    
    <!-- Tabel pembagi (√Σx²) -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Kriteria</th>
            <?php foreach($pembagi as $k=>$v): ?>
              <th><?= strtoupper($k) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>√(Σx²)</strong></td>
            <?php foreach($pembagi as $k=>$v): ?>
              <td><strong><?= round($v, 3) ?></strong></td>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="divider"></div>

    <!-- ===== STEP 2: Matriks Normalisasi R ===== -->
    <h2 class="section-title">
      <i class="fas fa-table"></i> Step 2: Matriks Normalisasi (R)
    </h2>
    <p class="text-muted">Rumus: R[i][j] = Nilai[i][j] / √(Σx²)[j]. Hasil normalisasi antara 0-1.</p>
    
    <!-- Tabel Matriks Normalisasi R -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Alternatif</th>
            <?php foreach(array_keys($pembagi) as $k): ?>
              <th><?= strtoupper($k) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $i=>$d): ?>
            <tr>
              <td><strong><?= $d['nama_alternatif'] ?></strong></td>
              <?php foreach($pembagi as $k=>$v): ?>
                <td><?= $R[$i][$k] ?></td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="divider"></div>

    <!-- ===== STEP 3: Matriks V (Ternormalisasi Terbobot) ===== -->
    <h2 class="section-title">
      <i class="fas fa-weight"></i> Step 3: Matriks V (Ternormalisasi Terbobot)
    </h2>
    <p class="text-muted">Rumus: V[i][j] = R[i][j] × W[j]. Mengalikan matriks normalisasi dengan bobot kriteria.</p>
    
    <!-- Tabel Matriks V -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Alternatif</th>
            <?php foreach($W as $k=>$w): ?>
              <th>
                <?= strtoupper($k) ?> 
                <br><small>(w=<?= $w ?>)</small>
              </th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $i=>$d): ?>
            <tr>
              <td><strong><?= $d['nama_alternatif'] ?></strong></td>
              <?php foreach($W as $k=>$w): ?>
                <td><?= $V[$i][$k] ?></td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="divider"></div>

    <!-- ===== STEP 4: Matriks Ideal Positif & Negatif ===== -->
    <h2 class="section-title">
      <i class="fas fa-star"></i> Step 4: Matriks Ideal Positif (A+) & Negatif (A-)
    </h2>
    <p class="text-muted">A+ = nilai maksimal setiap kriteria. A- = nilai minimal setiap kriteria dari matriks V.</p>
    
    <!-- Tabel Ideal Positif & Negatif -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Solusi Ideal</th>
            <?php foreach($W as $k=>$w): ?>
              <th><?= strtoupper($k) ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr class="table-success">
            <td><strong>A+ (Positif)</strong></td>
            <?php foreach($A_plus as $v): ?>
              <td><strong><?= $v ?></strong></td>
            <?php endforeach; ?>
          </tr>
          <tr class="table-danger">
            <td><strong>A- (Negatif)</strong></td>
            <?php foreach($A_minus as $v): ?>
              <td><strong><?= $v ?></strong></td>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="divider"></div>

    <!-- ===== STEP 5: Jarak ke D+ dan D- ===== -->
    <h2 class="section-title">
      <i class="fas fa-ruler"></i> Step 5: Jarak ke Solusi Ideal (D+ dan D-)
    </h2>
    <p class="text-muted">
      D+ = jarak Euclidean ke solusi ideal positif. 
      D- = jarak Euclidean ke solusi ideal negatif.
    </p>
    
    <!-- Tabel Jarak D+ dan D- -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Alternatif</th>
            <th class="text-success">D+ (Jarak ke A+)</th>
            <th class="text-danger">D- (Jarak ke A-)</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $i=>$d): ?>
            <tr>
              <td><strong><?= $d['nama_alternatif'] ?></strong></td>
              <td><span class="badge bg-success"><?= $D_plus[$i] ?></span></td>
              <td><span class="badge bg-danger"><?= $D_minus[$i] ?></span></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="divider"></div>

    <!-- ===== STEP 6: Nilai Preferensi C & Ranking ===== -->
    <h2 class="section-title">
      <i class="fas fa-trophy"></i> Step 6: Nilai Preferensi (C) & Ranking Final
    </h2>
    <p class="text-muted">
      Rumus: C[i] = D-[i] / (D+[i] + D-[i]). 
      Nilai C berkisar 0-1, semakin tinggi semakin baik.
    </p>
    
    <!-- Tabel Ranking Final -->
    <div class="table-responsive">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th>Ranking</th>
            <th>Alternatif</th>
            <th>Nilai Preferensi (C)</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rank = 1; // Counter untuk ranking
          foreach($ranking as $i=>$c_val): 
            // Tentukan badge rank berdasarkan posisi
            if($rank == 1){
              $badge_class = 'badge-rank badge-rank-1';
              $status = '🥇 Terbaik';
            } elseif($rank == 2){
              $badge_class = 'badge-rank badge-rank-2';
              $status = '🥈 Kedua';
            } elseif($rank == 3){
              $badge_class = 'badge-rank badge-rank-3';
              $status = '🥉 Ketiga';
            } else {
              $badge_class = 'badge-rank';
              $status = '✓ Alternatif';
            }
          ?>
            <tr>
              <td>
                <span class="<?= $badge_class ?>">#<?= $rank ?></span>
              </td>
              <td><strong><?= $data[$i]['nama_alternatif'] ?></strong></td>
              <td>
                <!-- Visualisasi progress bar untuk nilai C -->
                <div class="progress" style="height: 25px;">
                  <div class="progress-bar bg-success" role="progressbar" 
                       style="width: <?= $c_val * 100 ?>%;" aria-valuenow="<?= $c_val * 100 ?>" 
                       aria-valuemin="0" aria-valuemax="100">
                    <small><?= $c_val ?></small>
                  </div>
                </div>
              </td>
              <td><?= $status ?></td>
            </tr>
          <?php $rank++; endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- ===== TOMBOL AKSI ===== -->
    <div class="text-center my-5">
      <button class="btn btn-success btn-lg btn-action btn-print" onclick="window.print()">
        <i class="fas fa-print"></i> Print Preview
      </button>
      <a href="index.php" class="btn btn-outline-primary btn-lg btn-action ms-2">
        <i class="fas fa-arrow-left"></i> Kembali ke Home
      </a>
    </div>

  </div>

  <!-- ===== FOOTER SECTION: Bagian Footer ===== -->
  <div id="footer-section">
    <p>&copy; 2024 METODE TOPSIS - Sistem Pendukung Keputusan | Proses Normalisasi</p>
  </div>

  <!-- ===== BOOTSTRAP JS: Script untuk interaktivitas Bootstrap ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- ===== CUSTOM JAVASCRIPT ===== -->
  <script>
    // Animasi fade-in untuk tabel saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
      const tables = document.querySelectorAll('.table');
      tables.forEach((table, index) => {
        table.style.opacity = '0';
        // Animate with delay untuk efek cascade
        table.style.animation = `fadeIn 0.6s ease-in-out ${index * 0.1}s forwards`;
      });
    });

    // Event listener untuk tombol print
    document.querySelector('.btn-print').addEventListener('click', function() {
      setTimeout(() => {
        window.print();
      }, 200);
    });
  </script>
</body>
</html>
