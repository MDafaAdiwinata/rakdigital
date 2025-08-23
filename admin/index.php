 <?php
session_start();
// Redirect ke halaman daftar-ikan jika sudah login
if(isset($_SESSION['username'])) {
  header('location:dashboard.php');
  exit;
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Login</title>

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
    <link rel="stylesheet" href="assets/styles/index.css" />
  </head>
  <body>

	<!-- Input Login Admin Start -->
      <div class="container-fluid form-container">
          <form class="form-head position-absolute top-50 start-50 translate-middle" action="login.php" method="post">
            <div class="row">
              <div class="col">
                <h1 class="fs-2 fw-bold text-center mb-4">
                  Masuk Admin
                </h1>
              </div>
            </div>
              <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control border-secondary" id="username" name="username">
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control border-secondary" id="password" name="password">
              </div>
              <div class="d-grid gap-2">
                  <input class="login mt-3 btn btn-success border-0 shadow-sm fw-bold btn-masuk" type="submit" value="Masuk" name="login" />
              </div>
          </form>
      </div>

    <!-- Input Login Admin End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>