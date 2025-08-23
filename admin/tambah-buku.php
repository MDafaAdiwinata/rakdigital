 <?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Silakan Login Terlebih Dahulu!');
        window.location.href = 'index.php';
    </script>";
    exit;
}

if (isset($_POST['tambah'])) {
    $cover = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];
    move_uploaded_file($tmp, "assets/img/buku/" . $cover);

    mysqli_query($koneksi, "INSERT INTO daftar_buku SET
        judul_buku = '$_POST[judul_buku]',
        penulis = '$_POST[penulis]',
        kategori = '$_POST[kategori]',
        penerbit = '$_POST[penerbit]',
        tahun_terbit = '$_POST[tahun_terbit]',
        jumlah_halaman = '$_POST[jumlah_halaman]',
        status = '$_POST[status]',
        ISBN = '$_POST[isbn]',
        deskripsi = '$_POST[deskripsi]',
        cover = '$cover'
    ");

    echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location.href = 'kelola-buku.php';
    </script>";
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Tambah Buku</title>

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
    <link rel="stylesheet" href="assets/styles/tambah-buku.css" />
  </head>
  <body>

    <!-- Section Tambah Data Start -->

    <section id="tambah-data" class="py-lg-0 py-5">
        <div class="container vh-100 d-flex align-items-center form-container">
            <form action="" method="POST" class="my-5 border p-4 rounded-3 mx-auto form-head" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <h1 class="fs-lg-5 fs-sm-2 fw-bold text-center mb-5">
                            Tambah Data Buku
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="judul_buku" class="form-label">Judul Buku: </label>
                          <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                        </div>
                        <div class="mb-3">
                          <label for="penulis" class="form-label">Penulis: </label>
                          <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>
                        <div class="mb-3">
                          <label for="kategori" class="form-label">Kategori: </label>
                          <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="mb-3">
                          <label for="penerbit" class="form-label">Penerbit: </label>
                          <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                        </div>
                        <div class="mb-3">
                          <label for="tahun_terbit" class="form-label">Tahun Terbit: </label>
                          <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="jumlah_halaman" class="form-label">Jumlah Halaman: </label>
                          <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman" required>
                        </div>
                        <div class="mb-3">
                          <label for="status" class="form-label">Status: </label>
                          <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="mb-3">
                          <label for="isbn" class="form-label">ISBN: </label>
                          <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="mb-3">
                          <label for="deskripsi" class="form-label">deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="mb-3">
                          <label for="cover" class="form-label">Cover</label>
                          <input type="file" class="form-control" id="cover" name="cover" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <button type="submit" name="tambah" class="w-100 btn btn-success">Tambah</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="kelola-buku.php" class="w-100 btn btn-outline-secondary">Batalkan</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Section Tambah Data End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html