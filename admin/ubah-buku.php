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

// Ambil Data GET
$sql = mysqli_query( $koneksi, "SELECT * FROM daftar_buku WHERE id_buku='$_GET[kode]'" );
$data = mysqli_fetch_array( $sql );


// Logic Ubah Data
if ( isset($_POST['ubah']) )
{
    if ($_FILES['cover']['name'] != "") {
        move_uploaded_file($_FILES['cover']['tmp_name'], "assets/img/buku" . $_FILES['cover']['name']);
        $cover = $_FILES['cover']['name'];
    } else {
        $cover = $data['cover'];
    }
 
    mysqli_query( $koneksi, "UPDATE daftar_buku SET
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
    WHERE id_buku = '$_GET[kode]'");

  echo "<script>
  alert('Data Berhasil DiUbah!');
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
                            Ubah Data Buku
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="judul_buku" class="form-label">Judul Buku: </label>
                          <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $data['judul_buku'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="penulis" class="form-label">Penulis: </label>
                          <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $data['penulis'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="kategori" class="form-label">Kategori: </label>
                          <input type="text" class="form-control" id="" name="kategori" value="<?php echo $data['kategori'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="penerbit" class="form-label">Penerbit: </label>
                          <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $data['penerbit'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="tahun_terbit" class="form-label">Tahun Terbit: </label>
                          <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $data['tahun_terbit'] ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="jumlah_halaman" class="form-label">Jumlah Halaman: </label>
                          <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="<?php echo $data['jumlah_halaman'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="status" class="form-label">Status: </label>
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data['status'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="isbn" class="form-label">ISBN: </label>
                          <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $data['ISBN'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="deskripsi" class="form-label">deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="cover" class="form-label">Cover Buku</label>
                          <input type="file" class="form-control mb-2" id="Cover" name="cover" >
                        <small class="form-text text-muted">Cover saat ini: <?= $data['cover']; ?></small>
                        <?php if (!empty($data['cover']) && file_exists("assets/img/buku/" . $data['cover'])): ?>
                        <img src="assets/img/buku/<?=$data['cover']; ?>" alt="Preview cover"  width="150" class="mt-2 img-thumbnail d-block">
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <button type="submit" name="ubah" class="w-100 btn btn-success">Simpan</button>
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