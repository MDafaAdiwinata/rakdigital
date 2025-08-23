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

// Ambil nilai filter dari GET
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$status   = isset($_GET['status']) ? $_GET['status'] : '';
$filter_tahun = isset($_GET['filter_tahun']) ? $_GET['filter_tahun'] : '';
$search   = isset($_GET['search']) ? $_GET['search'] : '';

// Bangun query
$sql = "SELECT * FROM daftar_buku WHERE 1=1";

if ($kategori != '') {
    $sql .= " AND kategori = '$kategori'";
}
if ($status != '') {
    $sql .= " AND status = '$status'";
}
if ($search != '') {
    $sql .= " AND judul_buku LIKE '%$search%'";
}

if ($filter_tahun == 'asc') {
    $sql .= " ORDER BY tahun_terbit ASC";
} elseif ($filter_tahun == 'desc') {
    $sql .= " ORDER BY tahun_terbit DESC";
}

// Eksekusi query
$ambildata = mysqli_query($koneksi, $sql);

?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Daftar Buku</title>

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
    <link rel="stylesheet" href="assets/styles/daftar-buku.css" />
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
            <li class="nav-item">
              <a class="nav-link mt-3 mt-lg-0" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="daftar-buku.php">Daftar Buku</a>
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

        <!-- Section Daftar Buku Start -->
    
	    <section id="daftar-buku" class="pt5">
        <div class="container-fluid px-lg-5 px-3 py-5">
            <div class="row">
                <h1 class="display-5 fw-bold text-center mb-5">
                    Daftar <span style="color: #EC8F00;">Buku</span>
                </h1>
            </div>
            <div class="row">
                <div class="col">
                    <form method="GET" action="" class="row justify-content-center mb-4">
                    <div class="col-lg-2 col-md-3 mb-3">
                            <select name="kategori" class="form-select fs-4 ps-3 border-secondary" onchange="this.form.submit()">
                                <option value="">Semua Kategori</option>
                                <option value="Teknologi & Komputer" <?= ($kategori == 'Teknologi & Komputer') ? 'selected' : '' ?>>Teknologi & Komputer</option>
                                <option value="Novel" <?= ($kategori == 'Novel') ? 'selected' : '' ?>>Novel</option>
                                <option value="Bisnis & Ekonomi" <?= ($kategori == 'Bisnis & Ekonomi') ? 'selected' : '' ?>>Bisnis & Ekonomi</option>
                                <option value="Komik" <?= ($kategori == 'Komik') ? 'selected' : '' ?>>Komik</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 mb-3">
                            <select name="status" class="form-select fs-4 ps-3  border-secondary" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="tersedia" <?= ($status == 'tersedia') ? 'selected' : '' ?>>Tersedia</option>
                                <option value="dipinjam" <?= ($status == 'dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 mb-3">
                            <select name="filter_tahun" class="form-select fs-4 ps-3  border-secondary" onchange="this.form.submit()">
                                <option value="">Semua Tahun</option>
                                <option value="asc" <?= ($filter_tahun == 'asc') ? 'selected' : '' ?>>Tahun Terlama</option>
                                <option value="desc" <?= ($filter_tahun == 'desc') ? 'selected' : '' ?>>Tahun Terbaru</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 mb-3 d-flex">
                            <input
                                type="text"
                                name="search"
                                class="form-control me-2 fs-5 ps-3 border-secondary"
                                placeholder="Cari Buku..."
                                value="<?= $search ?>"
                            />
                            <button type="submit" class="fs-4 btn btn-outline-success">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">

            <!-- Query PHP Looping Daftar Buku Start -->

            <?php
                while( $tampildata = mysqli_fetch_array( $ambildata ) ) {
            ?>



                <div class="col-lg-2 col-md-4 col-6 mb-4 mb-lg-5">
                    <div class="card p-3 h-100 w-100 d-flex flex-column">
                        <img src="./assets/img/buku/<?= $tampildata['cover'] ?>" class="card-img-top" alt="Gambar Buku">
                        <div class="card-body p-1 mt-3">
                            <h5 class="card-title fs-4 fw-bold"><?= $tampildata['judul_buku'] ?></h5>
                            <p class="card-text fs-5 mt-3 mb-0">Penulis: <?= $tampildata['penulis'] ?></p>
                            <p class="card-text fs-5">Kategori: <?= $tampildata['kategori'] ?></p>
                        <button type="button" class="w-100 btn text-white " style="background-color: #197278;" data-bs-toggle="modal" data-bs-target="#modal<?= $tampildata['id_buku']; ?>">Detail</button>
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
                  <img src="./assets/img/buku/<?= $tampildata['cover']; ?>" width="250" class="img-thumbnail" alt="gambar ikan">
                </div>
                <h1 class="my-3 ms-2 fw-bold"><?= $tampildata['judul_buku']; ?></h1>
                <p class="ms-2 fs-5 mb-1">Penulis: <?= $tampildata['penulis']; ?></p>
                <p class="ms-2 fs-5 mb-1">Penerbit: <?= $tampildata['penerbit']; ?></p>
                <p class="ms-2 fs-5 mb-1">Tahun Terbit: <?= $tampildata['tahun_terbit']; ?></p>
                <p class="ms-2 fs-5 mb-1">Jumlah Halaman: <?= $tampildata['jumlah_halaman']; ?></p>
                <p class="ms-2 fs-5 mb-3">Kategori Buku: <?= $tampildata['kategori']; ?></p>
                <p class="fw-light px-2 mb-2" style="font-size: 1.3rem; text-align: justify;"><span class="fw-normal">Tentang Buku Ini:</span> <br>
                  <?= $tampildata['deskripsi']; ?>
                </p>
                <p class="ms-2 fs-5 fw-bold my-3 fs-5">Status: <?= $tampildata['status']; ?></p>
              </div>
            </div>
          </div>
        </div>

            <?php
                }
            ?>

            <?php if (mysqli_num_rows($ambildata) == 0): ?>
              <p class="text-center fs-5">Tidak ada buku yang sesuai dengan filter.</p>
            <?php endif; ?>

            <!-- Query PHP Looping Daftar Buku End -->

            </div>
        </div>
    </section>
    
    <!-- Section Daftar Buku End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>