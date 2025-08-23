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
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';

?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Profil</title>

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
    <link rel="stylesheet" href="./assets/styles/profil.css" />
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
              <a class="nav-link" href="lokasi.php">Lokasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rencana-kunjungan.php">Kunjungan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="profil.php">Profil</a>
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

	<!-- Section Profile Start -->

    <section class="py-5" id="profile">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="fw-bold">Profil</h1>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card rounded-3 p-5">
                        <div class="card-body" width="">
                            <img src="assets/img/admin-profile.png" class="card-img-top" alt="Profile Admin">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card rounded-3 p-4">
                        <div class="card-body" width="">
                            <div class="row">
                                <h1 class="fs-3 text-center">
                                    Informasi Pribadi
                                </h1>
                            </div>
                            <div class="row mt-5 ps-lg-5 ps-sm-0">
                                <h4 class="fw-light">
                                    Nama: <?php echo $username; ?>
                                </h4>
                                <h4 class="fw-light">
                                    Peran: Administrator Perpustakaan
                                </h4>
                                <h4 class="fw-light">
                                    Bergabung Sejak: Mei 2025
                                </h4>
                                <h4 class="fw-light">
                                    Alamat: SMK Bina Informatika
                                </h4>
                                <h4 class="fw-light">
                                    Jumlah Buku Dikelola: 40
                                </h4>
                            </div>
                            <div class="row mt-5 ps-lg-5 ps-sm-0">
                                <h4 class="fw-light">
                                    Fasilitas:
                                </h4>
                                <h4 class="fw-light mt-2">
                                    Kelola Data Buku, Kelola Anggota, Kelola Database, dan lain - lain
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col tombol-aksi">
                                    <a class="w-100 btn btn-warning" onclick="alert('Maaf, Fitur Belum Tersedia')">Edit Profil</a>
                                </div>
                                <div class="col tombol-aksi">
                                    <a href="logout.php" class="w-100 btn btn-danger" data-bs-toggle="modal" href="logout.php" data-bs-target="#staticBackdrop" >Keluar Akun</a>
                                </div>
                            </div>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- Section Profile End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>