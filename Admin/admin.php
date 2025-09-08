<?php
include 'koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    echo "<script>alert('Akses ditolak! Silakan login sebagai admin');location.href='login.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow p-4">
      <h2 class="mb-3">Halo Admin, <?php echo $_SESSION['user']['nama']; ?> 😎</h2> <?php echo $_SESSION['user']['nama']; ?> 👋</h2>
      <p>Selamat datang di dashboard admin.</p>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</body>
</html>
