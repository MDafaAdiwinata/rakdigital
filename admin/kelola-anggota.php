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
$emaildomain = isset($_GET['email_domain']) ? $_GET['email_domain'] : '';
$filterkota   = isset($_GET['filter_kota']) ? $_GET['filter_kota'] : '';
$search   = isset($_GET['search']) ? $_GET['search'] : '';

// Panggil Query
$sql = "SELECT * FROM anggota WHERE 1=1";

if ($emaildomain != '') {
  $sql .= " AND email LIKE '%@$emaildomain'";
}

if ($filterkota != '') {
  $sql .= " AND alamat LIKE '%$filterkota%'";
}

if ($search != '') {
    $sql .= " AND (username LIKE '%$search%' or nama LIKE '%$search%' or alamat LIKE '%$search%' OR email LIKE '%$search%' or no_telp LIKE '%$search%')";
}

// Eksekusi query
$ambildata = mysqli_query($koneksi, $sql);

// Logic Hapus Data Anggota
if ( isset($_GET['kode']) )
{
  mysqli_query( $koneksi, "DELETE FROM anggota WHERE id_anggota='$_GET[kode]'" );

  echo "<script>
  alert('Data Berhasil di Hapus!');
  window.location.href = 'kelola-anggota.php';
  </script>";
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Kelola Anggota</title>

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
                class="nav-link dropdown-toggle active"
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
                <li><a class="dropdown-item active bg-secondary" href="kelola-anggota.php">Kelola Anggota</a></li>
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

    <!-- Section Kelola Anggota Start -->

    <section id="kelola-anggota" class="mb-5">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 fw-bold text-center mb-5">
                        <span style="color: #810000;">Kelola </span>Anggota
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form method="GET" action="" class="row justify-content-center mb-4">
                        <div class="col-lg-3 col-md-3 mb-3">
                            <select name="email_domain" class="form-select fs-4 ps-3 border-secondary" onchange="this.form.submit()">
                                <option value="">Semua Email</option>
                                <option value="gmail.com" <?= ($emaildomain == 'gmail.com') ? 'selected' : '' ?>>Gmail</option>
                                <option value="yahoo.com" <?= ($emaildomain == 'yahoo.com') ? 'selected' : '' ?>>Yahoo</option>
                                <option value="apple.me" <?= ($emaildomain == 'apple.me') ? 'selected' : '' ?>>Apple</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 mb-3">
                            <select name="filter_kota" class="form-select fs-4 ps-3  border-secondary" onchange="this.form.submit()">
                                <option value="">Semua Kota</option>
                                <option value="jakarta" <?= ($filterkota == 'jakarta') ? 'selected' : '' ?>>Jakarta</option>
                                <option value="bandung" <?= ($filterkota == 'bandung') ? 'selected' : '' ?>>Bandung</option>
                                <option value="surabaya" <?= ($filterkota == 'surabaya') ? 'selected' : '' ?>>Surabaya</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 mb-3 d-flex">
                            <input
                                type="text"
                                name="search"
                                class="form-control me-2 fs-5 ps-3 border-secondary"
                                placeholder="Cari Anggota..."
                                value="<?= $search ?>"
                            />
                            <button type="submit" class="fs-4 btn btn-outline-dark">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="col-lg-2 ms-auto text-end">
                          <a href="tambah-anggota.php" class="btn btn-success">Tambah Anggota</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col table-responsive mb-5">
                    <table class="table table-bordered border-secondary table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th style="text-align: center">
                                    No
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    No Telfon
                                </th>
                                <th align="center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($tampildata = mysqli_fetch_array($ambildata)) {
                            ?>

                            <tr>
                                <td style="text-align: center">
                                    <?= $tampildata['id_anggota']; ?>
                                </td>
                                <td>
                                    <?= $tampildata['username']; ?>
                                </td>
                                <td>
                                    <?= $tampildata['nama']; ?>
                                </td>
                                <td>
                                    <?= $tampildata['alamat']; ?>
                                </td>
                                <td>
                                    <?= $tampildata['email']; ?>
                                </td>
                                <td>
                                    <?= $tampildata['no_telp']; ?>
                                </td>
                                <td align="center" width="10%">
                                    <a class="btn btn-warning me-2  btn-ubah" href="ubah-anggota.php?kode=<?= $tampildata['id_anggota']; ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger " href="?kode=<?= $tampildata['id_anggota'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="bi bi-trash"></i></a>
                                 </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if (mysqli_num_rows($ambildata) == 0): ?>
              <p class="text-center fs-5">Tidak ada anggota yang sesuai dengan filter.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Section Kelola Anggota End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>