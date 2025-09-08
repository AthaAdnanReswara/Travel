<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $password = md5($_POST['password']); 
    $level = $_POST['level']; // ambil dari input select

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE nama='$nama'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah ada!');</script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO users (nama,password,level) VALUES('$nama','$password','$level')");
        if ($query) {
            echo "<script>alert('Registrasi berhasil, silakan login');location.href='login.php'</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow-lg p-4" style="width: 350px;">
    <h3 class="text-center mb-3">Register</h3>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Level</label>
        <select name="level" class="form-select" required>
          <option value="pengunjung">Pengunjung</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <button type="submit" name="register" class="btn btn-success w-100">Register</button>
    </form>
    <p class="text-center mt-3 mb-0">Sudah punya akun? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
