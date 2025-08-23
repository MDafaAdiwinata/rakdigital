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
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Lokasi</title>

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

    <!-- Montserrat Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="assets/styles/lokasi.css" />
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
              <a class="nav-link mt-3 mt-lg-0" href="dashboard.php">Beranda</a>
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
              <a class="nav-link active" href="lokasi.php">Lokasi</a>
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

    <!-- Lokasi Main Start -->

    <section class="lokasi pt-5">
      <div class="container pt-4 text-center">
        <div class="row mt-5">
          <div class="col">
            <h1 class="fw-bold">Lokasi</h1>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col">
            <div class="map-container border">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.864806476786!2d106.71970879678955!3d-6.281497699999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f0754ef56067%3A0x8220dbf978d54527!2sSMK%20Bina%20Informatika!5e0!3m2!1sid!2sid!4v1748744189953!5m2!1sid!2sid"   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col my-3">
            <div class="card py-2" id="card-alamat-lengkap">
              <h1 class="fw-bold my-3">Alamat Lengkap:</h1>
              <p class="fs-4">Jl. Tegal Rotan Raya No.9 A, Sawah Baru, Kec. Ciputat, Kota Tangerang Selatan, Banten 15412</p>
            </div>
          </div>
        </div>
        <div class="row mt-3 mb-5">
          <div class="col text-start ">
            <h1 class="mb-3 fw-bold">Jam Operasional:</h1>
            <p class="fs-5 mb-0">
              Senin - Jumat | 08:00 - 20:00
            </p>
            <p class="fs-5 mb-0">
              Sabtu | 09:00 - 18:00
            </p>
            <p class="fs-5">
              Minggu | 10:00 - 16:00
            </p>
          </div>
          <div class="col text-end mt-3 mt-lg-0">
            <h1 class="mb-3 fw-bold">Hubungi Kami!</h1>
            <p class="fs-5 mb-0">
              Wa: 0857 - 6554 - 4476
            </p>
            <div class="fs-5">
              Telp: 021 - 324 - 565
            </div>
            <div class="fs-5">
              Email: rakdigital@gmail.com
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Lokasi Main End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>