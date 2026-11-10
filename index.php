<?php
// Home page for METODE_TOPSIS
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>METODE TOPSIS - Sistem Pendukung Keputusan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #0d6efd;
      --secondary-color: #6c757d;
    }

    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-custom {
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

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

    .card-menu {
      background: white;
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
      overflow: hidden;
      height: 100%;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .card-menu:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .card-menu .card-body {
      padding: 25px;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .card-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: var(--primary-color);
    }

    .card-menu .card-title {
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: #333;
    }

    .card-menu .card-text {
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 20px;
      flex-grow: 1;
    }

    .btn-action {
      align-self: flex-start;
      border-radius: 6px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-action:hover {
      transform: translateX(3px);
    }

    .container-main {
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      margin: 0 auto;
      max-width: 1200px;
    }

    .footer-section {
      text-align: center;
      padding: 20px;
      color: white;
      margin-top: 40px;
      font-size: 0.9rem;
    }

    .section-title {
      font-weight: 600;
      color: #333;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 3px solid var(--primary-color);
    }

    .divider {
      height: 1px;
      background: linear-gradient(to right, transparent, #ddd, transparent);
      margin: 40px 0;
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="index.php">
        <i class="fas fa-chart-line"></i> TOPSIS
      </a>
    </div>
  </nav>

  <!-- Header -->
  <div class="header-section">
    <div class="container">
      <h1><i class="fas fa-cogs"></i> METODE TOPSIS</h1>
      <p>Sistem Pendukung Keputusan dengan Metode Technique for Order of Preference by Similarity to Ideal Solution</p>
    </div>
  </div>

  <!-- Main Container -->
  <div class="container-main">
    <!-- Section 1: Data Input -->
    <h2 class="section-title"><i class="fas fa-database"></i> Manajemen Data</h2>
    <div class="row g-4 mb-5">
      <!-- Input Alternatif -->
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon"><i class="fas fa-list-check"></i></div>
            <h5 class="card-title">Input Alternatif</h5>
            <p class="card-text">Tambah, edit, atau kelola data alternatif yang akan diperingkat dalam analisis TOPSIS.</p>
            <a href="input_alternatif.php" class="btn btn-sm btn-primary btn-action">
              <i class="fas fa-arrow-right"></i> Buka
            </a>
          </div>
        </div>
      </div>

      <!-- Input Kriteria -->
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon"><i class="fas fa-sliders-h"></i></div>
            <h5 class="card-title">Input Kriteria</h5>
            <p class="card-text">Tentukan kriteria penilaian dan berikan bobot untuk setiap kriteria yang akan digunakan.</p>
            <a href="input_kriteria.php" class="btn btn-sm btn-primary btn-action">
              <i class="fas fa-arrow-right"></i> Buka
            </a>
          </div>
        </div>
      </div>

      <!-- Edit Nilai
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon"><i class="fas fa-edit"></i></div>
            <h5 class="card-title">Edit Nilai</h5>
            <p class="card-text">Ubah atau koreksi nilai-nilai alternatif terhadap kriteria yang telah diinputkan.</p>
            <a href="nilai_edit.php" class="btn btn-sm btn-primary btn-action">
              <i class="fas fa-arrow-right"></i> Buka
            </a>
          </div>
        </div>
      </div>
    </div> -->

    <div class="divider"></div>

    <!-- Section 2: Analysis -->
    <h2 class="section-title"><i class="fas fa-calculator"></i> Analisis & Perhitungan</h2>
    <div class="row g-4 mb-5">
      <!-- Matriks Keputusan -->
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon"><i class="fas fa-table"></i></div>
            <h5 class="card-title">Matriks Keputusan</h5>
            <p class="card-text">Lihat matriks keputusan (Decision Matrix) berisi nilai alternatif terhadap semua kriteria.</p>
            <a href="matrik_keputusan.php" class="btn btn-sm btn-info btn-action">
              <i class="fas fa-arrow-right"></i> Lihat
            </a>
          </div>
        </div>
      </div>

      <!-- Normalisasi -->
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon"><i class="fas fa-balance-scale"></i></div>
            <h5 class="card-title">Normalisasi</h5>
            <p class="card-text">Lakukan normalisasi pada matriks keputusan sebagai tahap penting dalam metode TOPSIS.</p>
            <a href="normalisasi.php" class="btn btn-sm btn-info btn-action">
              <i class="fas fa-arrow-right"></i> Proses
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Section 3: Data Management -->
    <h2 class="section-title"><i class="fas fa-trash-alt"></i> Manajemen Data Lanjutan</h2>
    <div class="row g-4 mb-5">
      <!-- Hapus Nilai -->
      <div class="col-md-6 col-lg-4">
        <div class="card-menu">
          <div class="card-body">
            <div class="card-icon text-danger"><i class="fas fa-times-circle"></i></div>
            <h5 class="card-title">Hapus Nilai</h5>
            <p class="card-text">Hapus data nilai alternatif yang tidak lagi diperlukan dari sistem.</p>
            <a href="nilai_delete_alternatif.php" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? Semua data terkait akan hilang.')">>
              <i class="fas fa-arrow-right"></i> Kelola
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <div class="footer-section">
    <p>&copy; 2026 METODE TOPSIS - Sistem Pendukung Keputusan | <a href="koneksi.php" class="text-white text-decoration-none">Konfigurasi Database</a></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Animasi fade-in pada card saat halaman load
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.card-menu');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.animation = `fadeIn 0.5s ease-in forwards ${index * 0.1}s`;
      });
    });
  </script>
  <style>
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
  </style>
</body>
</html>
