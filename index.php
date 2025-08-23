 <html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Landing Page</title>

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

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="./assets/styles/index.css" />
  </head>
  <body>
    <!-- Carousel Component Start -->

    <div
      id="carouselExampleAutoplaying"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="./assets/img/carousel1.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="./assets/img/carousel2.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item active">
          <img src="./assets/img/carousel3.png" class="d-block w-100" alt="" />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Carousel Component End -->

    <!-- Section Head Start -->

    <section
      class=""
      id="head-web"
      style="padding-top: 6rem; padding-bottom: 6rem"
    >
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 text-center mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-once="true">
            <img src="./assets/img/logo-brand/rakdigital.png" alt="" />
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1500" data-aos-once="true">
            <p class="fw-bold fst-italic fs-3">
              <span class="fst-normal" style="color: #c44536">Rak</span>Digital
            </p>
            <h1 class="display-3 fw-bold">Selamat Datang! 👋</h1>
            <h4 class="mt-2 mb-4 fw-light">
              📚<em> Raih Ilmu Untuk Masa Depan!</em>
            </h4>
            <p class="fs-4 text-justify">
              Kami adalah perpustakaan digital untuk semua. Temukan Banyana buku
              seru, jelajahi dunia lewat buku, dan nikmati pengalaman membaca
              yang mudah dan menyenangkan. Yuk, mulai membaca!
            </p>
            <div class="d-flex justify-content-lg-start justify-content-center">
              <a
                href="daftar-anggota.php"
                class="btn btn-outline-danger btn-lg me-2 mt-2 px-5 me-3"
                >Daftar</a
              >
              <a href="login-anggota.php" class="btn btn-success btn-lg mt-2 px-5">Login</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Head End -->

    <!-- Section Layanan Start -->

    <section id="layanan-kami">
      <div class="container pb-5 mb-5">
        <div class="row">
          <div class="col">
            <h1 class="fw-bold mb-5 text-center" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1200" data-aos-once="true">
              <span style="color: #197278">Layanan</span> Kami
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="500" data-aos-duration="1000" data-aos-once="true">
            <div class="card shadow-sm">
              <img
                src="./assets/img/layanan1.png"
                class="card-img-top rounded-none"
                alt="Layanan 1"
              />
              <div class="card-body">
                <h5 class="card-title fw-bold text-center fs-3 mb-3">
                  Katalog Buku
                </h5>
                <p class="card-text fs-5 text-center my-3">
                  Cari dan temukan buku favoritmu lewat daftar lengkap yang
                  mudah dijelajahi.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0" data-aos="zoom-out" data-aos-delay="1000" data-aos-duration="1000" data-aos-once="true">
            <div class="card shadow-sm">
              <img
                src="./assets/img/layanan2.png"
                class="card-img-top"
                alt="Layanan 1"
              />
              <div class="card-body">
                <h5 class="card-title fw-bold text-center fs-3 mb-3">
                  Rencana Kunjungan
                </h5>
                <p class="card-text fs-5 text-center my-3">
                  Atur kehadiranmu ke perpustakaan dengan form online yang
                  praktis.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="1500" data-aos-duration="1000" data-aos-once="true">
            <div class="card shadow-sm">
              <img
                src="./assets/img/layanan3.png"
                class="card-img-top"
                alt="Layanan 1"
              />
              <div class="card-body">
                <h5 class="card-title fw-bold text-center fs-3 mb-3">
                  Info Lokasi
                </h5>
                <p class="card-text fs-5 text-center my-3">
                  Lihat alamat, jam buka, dan peta rute menuju perpustakaan
                  kami.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Layanan End -->

    <!-- Section Hubungi Kami Start -->

    <section id="hubungi-kami">
      <div class="container pb-5">
        <div class="row">
          <div class="col">
            <h1 class="fw-bold mb-5 text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">
              <span style="color: #c44536">Hubung</span> Kami
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-lg-0 mb-5" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">
            <div class="ratio ratio-16x9 rounded shadow">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.056028583639!2d106.74974407706931!3d-6.2563496612584455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sid!2sid!4v1745458642358!5m2!1sid!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
          <div
            class="col-lg-6 d-flex flex-column align-items-center justify-content-center mb-4 mb-lg-0"
            data-aos="fade-right"
            data-aos-delay="1500"
            data-aos-duration="1000"
            data-aos-once="true"
          >
            <form class="w-75">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama: </label>
                <input
                  type="username"
                  class="form-control"
                  id="nama"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" />
              </div>
              <div class="mb-5">
                <label for="text" class="form-label">Pesan:</label>
                <input type="text" class="form-control id="text" />
              </div>
              <button type="submit" class="btn btn-outline-success w-100">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Hubungi Kami End -->

    <!-- Footer Start -->

    <footer class="section-footer mt-5" id="footer">
      <div class="container container-footer text-center text-white">
        <div class="mb-3 d-flex justify-content-center gap-5">
          <a
            href="https://www.instagram.com/adzzz_21?igsh=MW9ibGg1d2Z4OHZocw=="
            target="_blank"
            ><i class="bi bi-instagram fs-1 text-white"></i
          ></a>
          <a href="https://github.com/MDafaAdiwinata" target="_blank"
            ><i class="bi bi-github fs-1 text-white"></i
          ></a>
          <a href="https://linkedin.com/in/adzzz" target="_blank"
            ><i class="bi bi-linkedin fs-1 text-white"></i
          ></a>
        </div>
        <div class="fs-5 fw-light">
          Created by <span class="fw-bold">Adi X - RPL</span> | © 2025
        </div>
      </div>
    </footer>

    <!-- Footer End -->

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>