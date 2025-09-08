<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $password = md5($_POST['password']); 

    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE nama='$nama' AND password='$password'"); 
    $result = mysqli_num_rows($sql);

    if ($result > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($sql);
        $_SESSION['role'] = $_SESSION['user']['level'];      

        if ($_SESSION['role'] == "admin") {
            echo '<script>alert("Login berhasil sebagai Admin");location.href="index.php"</script>';
        } else {
            echo '<script>alert("Login berhasil sebagai Pengunjung");location.href="../index.php"</script>';
        }
    } else {
        echo '<script>alert("Maaf, Username/Password salah");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow-lg p-4" style="width: 350px;">
    <h3 class="text-center mb-3">Login</h3>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="text-center mt-3 mb-0">Belum punya akun? <a href="register.php">Register</a></p>
  </div>
</body>
</html>
