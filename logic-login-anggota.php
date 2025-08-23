 <?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Ambil data user berdasarkan username
    $sql = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username = '$username'");
    $data = mysqli_fetch_assoc($sql);

    // Cek apakah user ditemukan
    if ($data) {
        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Password cocok
            $_SESSION['username'] = $username;
            echo "<script>
                alert('Login Berhasil! Selamat Datang!');
                window.location.href = 'beranda.php';
            </script>";
        } else {
            // Password salah
            echo "<script>
                alert('Password salah!');
                window.location.href = 'login-anggota.php';
            </script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>
            alert('Username tidak ditemukan!');
            window.location.href = 'login-anggota.php';
        </script>";
    }
}
?>