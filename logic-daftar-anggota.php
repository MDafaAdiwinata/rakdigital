 <?php
session_start();
include 'koneksi.php';

// Daftar Akun Anggota
if (isset($_POST['daftar'])) {

    // jika tombol register diklik
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];

    // fungsi enkripsi
    $enkripPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert to db
    $insert = mysqli_query($koneksi, "INSERT INTO anggota (username, password, nama, alamat, email, no_telp) VALUES ('$username', '$enkripPassword', '$nama', '$alamat', '$email', '$no_telp')");

    if ($insert) {
        // jika berhasil
        echo '
        <script>
            alert("Daftar Berhasil, Silahkan Login!");
            window.location.href="login-anggota.php";
        </script>
        ';
    } else {
        // jika gagal
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="daftar-anggota.php";
        </script>
        ';
    }
}