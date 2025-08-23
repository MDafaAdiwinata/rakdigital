 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Login Anggota</title>

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
    <link rel="stylesheet" href="./assets/styles/login.css" />
  </head>
  <body>

    <!-- Input Login User Start -->
    <div class="container-fluid form-container">
      <form
        class="form-head border border-secondary position-absolute top-50 start-50 translate-middle"
        action="logic-login-anggota.php"
        method="post"
      >
        <div class="row">
          <div class="col">
            <h1 class="fs-2 fw-bold text-center mb-4">Masuk</h1>
          </div>
        </div>
        <div class="mb-4">
          <label for="username" class="form-label">Username:</label>
          <input
            type="text"
            class="form-control border-secondary"
            id="username"
            name="username"
            required
          />
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Password:</label>
          <input
            type="password"
            class="form-control border-secondary"
            id="password"
            name="password"
            required
          />
        </div>
        <div class="d-grid gap-2">
          <button class="login mt-3 btn btn-success border-0 shadow-sm fw-bold btn-masuk" type="submit" name="login">
            Masuk
          </button>
          <a
            href="index.php"
            class="mt-2 border-0 btn btn-danger text-center text-decoration-none"
            >Kembali</a
          >
        </div>
        <div class="form-extra text-center mt-4" style="font-size: 1.2rem;">
          <p>Belum Punya Akun? <a href="daftar-anggota.php">Daftar</a></p>
        </div>
      </form>
    </div>

    <!-- Input Login User End -->

    <!-- Script Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>