 <?php

include "koneksi.php";
session_start();
if ( !isset($_SESSION['username']) )
{
    echo "
    <script>
        alert('Silahkan Login Terlebih Dahulu!');
        window.location.href = 'index.php';
    </script>
    ";
}

$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';

?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Dashboard</title>

    <!-- Rak Digital icon -->
    <link
      rel="shortcut icon"
      href="assets/img/logo-brand/rakdigital.png"
      type="image/x-icon"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />

    <!-- Montserrat Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/styles/dashboard.css" />
  </head>
  <body>

    <!-- Navbar Start -->

    <nav
      class="navbar navbar-expand-lg navbar-light p-3 sticky-top"
      style="background-color: #FFF1F1"
    >
      <div class="container">
        <img src="./assets/img/logo-brand/rakdigital.png" class="me-3" alt="Bootstrap" width="45">
        <a class="navbar-brand d-lg-inline d-md-inline d-sm-inline d-none fw-bold fs-3" style="color: #C44536;" href="#"
          >Rak<span class="fst-italic text-dark">Digital</span></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto fs-5 gap-lg-4 fw-light me-4">
            <li class="nav-item ">
              <a class="nav-link active mt-3 mt-lg-0" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar-buku.php">Daftar Buku</a>
            </li>
            <!-- Dropdown Start -->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="daftarIkanDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Kelola
              </a>
              <ul class="dropdown-menu" aria-labelledby="daftarIkanDropdown">
                <li><a class="dropdown-item" href="#"></a></li>
                <li><a class="dropdown-item" href="kelola-buku.php">Kelola Buku</a></li>
                <li><a class="dropdown-item" href="kelola-anggota.php">Kelola Anggota</a></li>
              </ul>
            </li>
            <!-- Dropdown End -->
            <li class="nav-item">
              <a class="nav-link" href="lokasi.php">Lokasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rencana-kunjungan.php">Kunjungan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil.php">Profil</a>
            </li>
          </ul>
          <div class="d-none d-lg-flex gap-3">
              <a class="btn btn-outline-danger py-2" data-bs-toggle="modal" href="logout.php" data-bs-target="#staticBackdrop"><i class="bi bi-arrow-bar-right"></i>
              </a>
            </div>
            <div class="d-flex d-lg-none flex-column gap-3 mt-3">
              <a class="btn btn-outline-danger py-2" data-bs-toggle="modal" href="logout.php" data-bs-target="#staticBackdrop">
                <i class="bi bi-arrow-bar-right"></i>
              </a>
            </div>
        </div>
      </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"    aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Peringatan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"     aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>
              Apakah anda ingin logout?
            </p>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
            <a type="button" class="btn btn-danger" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar End -->

    <!-- Section Head Main Start -->

    <section id="head-user" class="d-flex align-items-center" style="min-height: 85vh;">
  <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-5 d-lg-block d-none text-center">
            <div style="width:  500px; height: 500px; margin: 0 auto; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
          <img src="assets/img/admin-profile.png" alt="User" style="width: 500px; height: 500px; ">
        </div>
    </div>
    <div class="col-lg-7 text-center text-md-start">
        <h1 class="display-5 fw-bold mb-3">Selamat Datang <?php echo $username; ?>!👋</h1>
        <h4 class="fw-light fst-italic mb-3" style="color: #666;">
          🛠️ Menata Pengetahuan, Melayani Generasi!
        </h4>
        <p class="mb-4 fs-4" style="text-align: jusitfy;">
        Selamat bertugas kembali! Silakan kelola data pengguna, koleksi buku, serta pantau aktivitas perpustakaan dengan mudah dan efisien.
        </p>
        <a href="kelola-buku.php" class="btn btn-warning fw-bold px-4 btn-lg shadow-sm me-2" style="color: white; background-color: #EC8F00; border: none;">
          Kelola Buku
        </a>
        <a href="kelola-anggota.php" class="btn btn-outline-success fw-bold px-4 btn-lg ">
          Kelola Anggota
        </a>
    </div>
    </div>
  </div>
</section>

    <!-- Section Head Main End -->

    <!-- Section Statistik Start -->
    <section id="statistik" class="py-5">
      <div class="container">
        <h2 class="text-center mb-4">Statistik Perpustakaan</h2>
        
        <!-- Card Statistik -->
        <div class="row g-4 mb-4">
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="bi bi-book fs-1 text-primary mb-"></i>
                <h3 class="card-title h5">Total Buku</h3>
                <h2 class="display-4 fw-bold" id="totalBuku">0</h2>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="bi bi-people fs-1 text-success mb-3"></i>
                <h3 class="card-title h5">Total Anggota</h3>
                <h2 class="display-4 fw-bold" id="totalAnggota">0</h2>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="bi bi-bookmark-check fs-1 text-warning mb-3"></i>
                <h3 class="card-title h5">Buku Dipinjam</h3>
                <h2 class="display-4 fw-bold" id="totalDipinjam">0</h2>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="bi bi-bookmark-plus fs-1 text-info mb-3"></i>
                <h3 class="card-title h5">Buku Tersedia</h3>
                <h2 class="display-4 fw-bold" id="totalTersedia">0</h2>
              </div>
            </div>
          </div>
        </div>

        <!-- Chart Container -->
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Status Buku</h5>
                <canvas id="statusBukuChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Jenis Buku</h5>
                <canvas id="jenisBukuChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Statistik End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom Script untuk Statistik -->
    <script>
      // Mengambil data statistik dari PHP
      <?php
      // Query untuk total buku
      $queryTotalBuku = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM daftar_buku");
      $totalBuku = mysqli_fetch_assoc($queryTotalBuku)['total'];

      // Query untuk total anggota
      $queryTotalAnggota = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM anggota");
      $totalAnggota = mysqli_fetch_assoc($queryTotalAnggota)['total'];

      // Query untuk status buku (Tersedia/Dipinjam)
      $queryStatusBuku = mysqli_query($koneksi, "
        SELECT status, COUNT(*) as total 
        FROM daftar_buku 
        GROUP BY status
      ");

      $labelsStatus = [];
      $dataStatus = [];
      while($row = mysqli_fetch_assoc($queryStatusBuku)) {
        $labelsStatus[] = $row['status'];
        $dataStatus[] = $row['total'];
      }

      // Query untuk kategori buku
      $queryKategoriBuku = mysqli_query($koneksi, "
        SELECT kategori, COUNT(*) as total 
        FROM daftar_buku 
        GROUP BY kategori
        ORDER BY total DESC
      ");

      $labelsKategori = [];
      $dataKategori = [];
      while($row = mysqli_fetch_assoc($queryKategoriBuku)) {
        $labelsKategori[] = $row['kategori'];
        $dataKategori[] = $row['total'];
      }
      ?>

      // Update card statistik
      document.getElementById('totalBuku').textContent = <?php echo $totalBuku; ?>;
      document.getElementById('totalAnggota').textContent = <?php echo $totalAnggota; ?>;

      // Hitung total buku dipinjam dan tersedia
      let totalDipinjam = 0;
      let totalTersedia = 0;
      <?php
      foreach($dataStatus as $index => $value) {
          if($labelsStatus[$index] === 'Dipinjam') {
              echo "totalDipinjam = $value;";
          } else if($labelsStatus[$index] === 'Tersedia') {
              echo "totalTersedia = $value;";
          }
      }
      ?>
      document.getElementById('totalDipinjam').textContent = totalDipinjam;
      document.getElementById('totalTersedia').textContent = totalTersedia;

      // Chart Status Buku
      new Chart(document.getElementById('statusBukuChart'), {
        type: 'pie',
        data: {
          labels: <?php echo json_encode($labelsStatus); ?>,
          datasets: [{
            data: <?php echo json_encode($dataStatus); ?>,
            backgroundColor: [
              'rgba(75, 192, 192, 0.5)',  // Tersedia
              'rgba(255, 99, 132, 0.5)',  // Dipinjam
            ],
            borderColor: [
              'rgba(75, 192, 192, 1)',
              'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom'
            },
            title: {
              display: true,
              text: 'Distribusi Status Buku'
            }
          }
        }
      });

      // Chart Kategori Buku
      new Chart(document.getElementById('jenisBukuChart'), {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($labelsKategori); ?>,
          datasets: [{
            label: 'Jumlah Buku',
            data: <?php echo json_encode($dataKategori); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1
              }
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'Kategori Buku'
            }
          }
        }
      });
    </script>
  </body>
</html>