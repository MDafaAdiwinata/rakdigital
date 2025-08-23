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

?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Rencana Kunjungan</title>

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
    <link rel="stylesheet" href="./assets/styles/rencana-kunjungan.css" />
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
              <a class="nav-link mt-3 mt-lg-0" href="beranda.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar-buku.php">Daftar Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lokasi.php">Lokasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="rencana-kunjungan.php">Kunjungan</a>
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

    <!-- Section Rencana Kunjungan Start -->

    <section id="rencana-kunjungan">
      <div class="container pb-5">
        <div class="row my-5">
          <div class="col text-center">
            <h1 class="fw-bold"><span style="color: #197278;">Rencana </span>Kunjungan</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card rounded-3 p-2">
              <div class="card-body">
                <form id="attendanceForm">
                  <div class="mb-3">
                    <label for="namaLengkap" class="form-label">Nama lengkap: </label>
                    <input type="text" class="form-control" id="namaLengkap"                aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" class="form-control" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="waktuKunjungan" class="form-label">Waktu Kunjungan: </label>
                    <input type="datetime-local" class="form-control" id="waktuKunjungan" required>
                  </div>
                  <div class="mb-4">
                    <label for="tujuanKunjungan" class="form-label">Tujuan Kunjungan:</label>
                    <textarea id="tujuanKunjungan" class="form-control" name="tujuanKunjungan" rows="3" required></textarea>
                  </div>
                  <button type="submit" class="w-100 btn btn-outline-success mb-0">Kirim</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col">
            <table class="table table-bordered table-hover border-secondary table-responsive" id="attendanceTable">
              <thead class="table-success">
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Waktu Kunjungan</th>
                  <th scope="col">Tujuan Kunjungan</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Rencana Kunjungan End -->

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

    <script>
      const form = document.getElementById("attendanceForm");
      const tableBody = document.querySelector("#attendanceTable tbody");

      const renderTable = () => {
        tableBody.innerHTML = "";
        (JSON.parse(localStorage.getItem("attendanceData")) || []).forEach(d => {
          tableBody.innerHTML += `
            <tr>
              <td>${d.name}</td>
              <td>${d.email}</td>
              <td>${d.waktu}</td>
              <td>${d.tujuan}</td>
            </tr>`;
        });
      };
    
      renderTable();
    
      form.onsubmit = e => {
        e.preventDefault();
        const data = {
          name: form.namaLengkap.value,
          email: form.email.value,
          waktu: new Date(form.waktuKunjungan.value).toLocaleString("id-ID"),
          tujuan: form.tujuanKunjungan.value
        };
      
        const saved = JSON.parse(localStorage.getItem("attendanceData")) || [];
        saved.push(data);
        localStorage.setItem("attendanceData", JSON.stringify(saved));
      
        renderTable();
        form.reset();
      };

      localStorage.removeItem("attendanceData");

    </script>


    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>