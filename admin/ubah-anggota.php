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
$sql = mysqli_query( $koneksi, "SELECT * FROM anggota WHERE id_anggota='$_GET[kode]'" );
$data = mysqli_fetch_array( $sql );

// Logic Ubah Data Anggota
if (isset($_POST['ubah'])) {
    $id       = $data['id_anggota'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $nama     = $_POST['nama_lengkap'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $password = $_POST['password'];

    // Cek duplikat username (kecuali milik sendiri)
    $cek = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username' AND id_anggota!='$id'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Username sudah digunakan!');
                window.history.back();
              </script>";
        exit;
    }

    // Update Data Anggota
    if (!empty($password)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE anggota SET 
                    username='$username', email='$email', nama='$nama', 
                    alamat='$alamat', no_telp='$no_telp', password='$password_hash' 
                  WHERE id_anggota='$id'";
    } else {
        $query = "UPDATE anggota SET 
                    username='$username', email='$email', nama='$nama', 
                    alamat='$alamat', no_telp='$no_telp' 
                  WHERE id_anggota='$id'";
    }

    mysqli_query($koneksi, $query);
    echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'kelola-anggota.php';
          </script>";
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rak Digital - Admin Ubah Anggota</title>

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
    <link rel="stylesheet" href="assets/styles/ubah-anggota.css" />
  </head>
  <body>

    <!-- Section Tambah Anggota Start -->

    <section id="tambah-anggota" class="py-lg-0 py-5">
        <div class="container vh-100 d-flex align-items-center form-container">
            <form action="" method="POST" class="my-5 border p-4 rounded-3 mx-auto form-head">
                <div class="row">
                    <div class="col">
                        <h1 class="fs-lg-5 fs-sm-2 fw-bold text-center mb-5">
                            Ubah Anggota
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="username" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email: </label>
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password: </label>
                          <input type="password" class="form-control" id="password" value="<?php echo $data['password'] ?>" name="password" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nama_lengkap" class="form-label">Nama Lengkap: </label>
                          <input type="text" class="form-control" id="nama_lengkap" value="<?php echo $data['nama'] ?>" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat: </label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo $data['alamat'] ?>" name="alamat" required>
                        </div>
                        <div class="mb-3">
                          <label for="no_telp" class="form-label">Nomor Telfon: </label>
                          <input type="number" class="form-control" id="no_telp" value="<?php echo $data['no_telp'] ?>" name="no_telp" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <button type="submit" name="ubah" class="w-100 btn btn-success">Ubah</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="kelola-anggota.php" class="w-100 btn btn-outline-secondary">Batalkan</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Section Tambah Anggota End -->

    <!-- Script Bootrstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>