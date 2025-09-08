<?php
include 'koneksi.php';

// cek apakah user admin
if (!isset($_SESSION['user']) || $_SESSION['user']['level'] != 'admin') {
    echo "<script>alert('Akses ditolak!');location.href='login.php';</script>";
    exit();
}

// ubah status booking jika ada request
if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $aksi = $_GET['aksi'];

    if (in_array($aksi, ['Pending','Lunas','Batal'])) {
        mysqli_query($koneksi, "UPDATE booking SET status='$aksi' WHERE id='$id'");
        echo "<script>alert('Status booking diperbarui!');location.href='dashboard_booking.php';</script>";
        exit();
    }
}

// ambil semua data booking (join users & destinasi)
$q = mysqli_query($koneksi, "
    SELECT b.*, u.nama as nama_user, u.email, u.whatsapp, d.nama as destinasi, d.harga 
    FROM booking b
    JOIN users u ON b.user_id = u.id
    JOIN destinasi d ON b.destinasi_id = d.id
    ORDER BY b.created_at DESC
");
?>

<div class="container">
  <h2 class="mb-4">Dashboard Booking</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>no</th>
        <th>Nama User</th>
        <th>WhatsApp</th>
        <th>Email</th>
        <th>Destinasi</th>
        <th>Tanggal</th>
        <th>Orang</th>
        <th>Total</th>
        <th>Status</th>
        <th style="width: 30%;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while ($row = mysqli_fetch_assoc($q)) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nama_user']); ?></td>
        <td><?= htmlspecialchars($row['whatsapp']); ?></td>
        <td><?= htmlspecialchars($row['email']); ?></td>
        <td><?= htmlspecialchars($row['destinasi']); ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['jumlah_orang']; ?></td>
        <td>Rp<?= number_format($row['total'],0,',','.'); ?></td>
        <td><span class="badge bg-<?= $row['status']=='Lunas'?'success':($row['status']=='Batal'?'danger':'warning'); ?>">
            <?= $row['status']; ?>
        </span></td>
        <td>
          <a href="?aksi=Pending&id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary">Pending</a>
          <a href="?aksi=Lunas&id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Lunas</a>
          <a href="?aksi=Batal&id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Batal</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
