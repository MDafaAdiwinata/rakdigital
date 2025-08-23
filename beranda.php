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
    <title>Rak Digital - Beranda</title>

    <!-- Rak Digital icon -->
    <link
      rel="shortcut icon"
      href="./assets/img/logo-brand/rakdigital.png"
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

    <!-- Ubuntu Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="./assets/styles/beranda.css" />
  </head>
  <body>
    <!-- Navbar Start -->

    <nav
      class="navbar navbar-expand-lg navbar-light p-3 fixed-top bg-nav"
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
            <li class="nav-item">
              <a class="nav-link active mt-3 mt-lg-0" href="beranda.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar-buku.php">Daftar Buku</a>
            </li>
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
              <a class="btn btn-outline-danger py-2" data-bs-toggle="modal" href="logout.php" data-bs-target="#staticBackdrop"><i class="bi bi-arrow-bar-right"></i></a>
          </div>
          <div class="d-flex d-lg-none flex-column gap-3 mt-3">
              <a class="btn btn-outline-danger w-100 py-2" data-bs-toggle="modal" href="logout.php" data-bs-target="#staticBackdrop"><i class="bi bi-arrow-bar-right"></i></a>
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

    <section id="head-user" class="d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 text-center text-md-start mb-4 mb-md-0">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang <?php echo $username; ?>!👋</h1>
        <h4 class="fw-light fst-italic mb-4" style="color: #666;">
          📚 Raih Ilmu Untuk Masa Depan!
        </h4>
        <p class="mb-4 fs-4" style="text-align: jusitfy;">
        Senang bertemu lagi! Ayo mulai jelajahi koleksi buku, atur rencana kunjungan, dan manfaatkan layanan perpustakaan digital dengan mudah!.
        </p>
        <a href="daftar-buku.php" class="btn btn-warning fw-bold px-4 py-2 btn-lg shadow" style="color: white; background-color: #EC8F00; border: none;">
          Lihat Daftar Buku
        </a>
      </div>
      <div class="col-lg-5 d-lg-block d-none text-center">
        <div style="width: 500px; height: 500px; margin: 0 auto; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
          <img src="./assets/img/pp-anggota-polos.png" alt="User" style="width: 500px; height: 500px; ">
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Section Head Main End -->

    <!-- Section Rekomendasi Buku Terbaru Start -->

<section class="py-5" id="berita-terbaru" style="background-color: #fef3ef;">
  <div class="container text-center">
    <h1 class="display-5 fw-bold text-center mb-5">
      <span style="color: #810000;">Rekomendasi</span> Buku
    </h1>
<div class="row mt-4 justify-content-center">
  <?php
    include 'koneksi.php';
    $ambildata = mysqli_query($koneksi, "SELECT * FROM daftar_buku WHERE status = 'Tersedia' ORDER BY RAND() LIMIT 3");
    while($tampildata = mysqli_fetch_assoc($ambildata)) {
  ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card p-3 h-100 w-100 d-flex flex-column shadow-sm">
        <img src="./assets/img/buku/<?= $tampildata['cover'] ?>" class="card-img-top" alt="Cover <?= $tampildata['judul_buku']; ?>">
        <div class="card-body p-1 mt-3">
          <h5 class="card-title fs-4 fw-bold"><?= $tampildata['judul_buku'] ?></h5>
          <p class="card-text fs-5 mt-3 mb-0">Penulis: <?= $tampildata['penulis'] ?></p>
          <p class="card-text fs-5">Penerbit: <?= $tampildata['penerbit'] ?></p>
          <button type="button" class="w-100 btn text-white" style="background-color: #197278;" data-bs-toggle="modal" data-bs-target="#modal<?= $tampildata['id_buku']; ?>">Detail</button>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal<?= $tampildata['id_buku']; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $tampildata['id_buku']; ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4 fw-bold" id="modalLabel<?= $tampildata['id_buku']; ?>">Detail Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            <div class="text-center">
              <img src="./assets/img/buku/<?= $tampildata['cover']; ?>" width="250" class="img-thumbnail" alt="Cover <?= $tampildata['judul_buku']; ?>">
            </div>
            <h1 class="my-3 ms-2"><?= $tampildata['judul_buku']; ?></h1>
            <p class="ms-2 fs-5 mb-1">Penulis: <?= $tampildata['penulis']; ?></p>
            <p class="ms-2 fs-5 mb-1">Penerbit: <?= $tampildata['penerbit']; ?></p>
            <p class="ms-2 fs-5 mb-1">Tahun Terbit: <?= $tampildata['tahun_terbit']; ?></p>
            <p class="ms-2 fs-5 mb-3">Jumlah Halaman: <?= $tampildata['jumlah_halaman']; ?></p>
            <p class="fw-light px-2 mb-2" style="font-size: 1.3rem; text-align: justify;"><span class="fw-normal">Tentang Buku Ini:</span><br>
              <?= $tampildata['deskripsi']; ?>
            </p>
            <p class="ms-2 fs-5 fw-bold my-3 text-center">Status: <?= $tampildata['status']; ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<div class="row justify-content-center">
  <div class="col-lg-3 my-3">
    <a href="daftar-buku.php" class="btn btn-outline-success px-4 btn-lg shadow-sm" >Lihat Semua Buku</a>
  </div>
</div>

  </div>
</section>

    <!-- Section Rekomendasi Buku Terbaru End -->

    <!-- Footer Start -->

    <footer class="section-footer" id="footer">
      <div class="container container-footer text-center text-white">
        <div class="mb-3 d-flex justify-content-center gap-5">
          <a href="https://www.instagram.com/adzzz_21?igsh=MW9ibGg1d2Z4OHZocw==" target="_blank"
            ><i class="bi bi-instagram fs-1 text-white"></i
          ></a>
          <a href="https://github.com/MDafaAdiwinata" target="_blank"
            ><i class="bi bi-github fs-1 text-white"></i
          ></a>
          <a href="https://linkedin.com/in/adzzz" target="_blank"
            ><i class="bi bi-linkedin fs-1 text-white"></i
          ></a>
        </div>
        <div
          class="footer-link d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-5 mb-2"
        >
          <a
            class="text-white fw-bold fs-5 text-decoration-none"
            href="#"
            >Beranda</a
          >
          <a
            class="text-white fw-bold text-decoration-none fs-5"
            href="#"
            >Daftar Buku</a
          >
          <a
            class="text-white fw-bold text-decoration-none fs-5"
            href="#"
            >Lokasi</a
          >
          <a
            class="text-white fw-bold text-decoration-none fs-5"
            href="#"
            >Kunjungan</a
          >
          <a
            class="text-white fw-bold text-decoration-none fs-5"
            href="#"
            >Profil</a
          >
        </div>
        <div class="fs-5 fw-light">
          Created by <span class="fw-bold">Adi X - RPL</span> | © 2025
        </div>
      </div>
    </footer>

    <!-- Footer End -->

    <!-- Script Internal -->
    <script>
      const navbar = document.querySelector(".navbar");

      window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
          navbar.classList.add("navbar-blur");
        } else {
          navbar.classList.remove("navbar-blur");
        }
      });
    </script>

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>