<?php
session_start();
include 'Admin/koneksi.php';

// cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header("Location: Admin/login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

// cek apakah ada destinasi tertentu yang dipilih
$selected_destinasi_id = isset($_GET['destinasi']) ? intval($_GET['destinasi']) : 0;

if ($selected_destinasi_id > 0) {
    // hanya ambil destinasi sesuai id
    $destinasi_q = mysqli_query($koneksi, "SELECT * FROM destinasi WHERE id='$selected_destinasi_id'");
} else {
    // kalau tidak ada id, tampilkan semua
    $destinasi_q = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY nama ASC");
}

// 🔹 fungsi simpan booking
function simpanBooking($koneksi, $user_id, $destinasi_id, $tanggal, $jumlah_orang, $metode_bayar, $catatan) {
    // ambil harga destinasi
    $h = mysqli_query($koneksi, "SELECT harga FROM destinasi WHERE id='$destinasi_id'");
    $row = mysqli_fetch_assoc($h);
    $harga = $row['harga'];

    $total = $harga * $jumlah_orang;

    // insert ke tabel booking
    $insert = "INSERT INTO booking 
        (user_id, destinasi_id, tanggal, jumlah_orang, metode_bayar, catatan, total, status, created_at) 
        VALUES 
        ('$user_id', '$destinasi_id', '$tanggal', '$jumlah_orang', '$metode_bayar', '$catatan', '$total', 'Pending', NOW())";

    return mysqli_query($koneksi, $insert);
}

// jika form disubmit
if (isset($_POST['simpan'])) {
    $destinasi_id = $_POST['destinasi'];
    $tanggal = $_POST['tanggal'];
    $jumlah_orang = $_POST['orang'];
    $metode_bayar = $_POST['metode'];
    $catatan = $_POST['catatan'];

    if (simpanBooking($koneksi, $user_id, $destinasi_id, $tanggal, $jumlah_orang, $metode_bayar, $catatan)) {
        echo "<script>alert('Booking berhasil!'); window.location='riwayat_booking.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking Traveling</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-custom { border-radius: 12px; cursor: pointer; transition: .3s; }
    .card-custom:hover { transform: scale(1.02); box-shadow: 0 6px 15px rgba(0,0,0,.1); }
    .card-active { border: 2px solid #0077ff; background: #f0f8ff; }
    .summary { background: #f8f9fa; border-radius: 12px; padding: 15px; }
    .btn-booking { display:inline-block; background:linear-gradient(135deg,#023085ff,#0077ffff); color:#fff; font-weight:600; font-size:16px; padding:12px 24px; border:none; border-radius:50px; cursor:pointer; box-shadow:0 4px 10px rgba(37,211,102,.3); transition:.3s; }
    .btn-booking:hover { background:linear-gradient(135deg,#09c9c9ff,#0a2497ff); transform:translateY(-2px) scale(1.05); box-shadow:0 6px 15px rgba(18,140,126,.4); }
  </style>
</head>
<body class="p-4">
<div class="container">
  <div class="row">
    <!-- Form Booking -->
    <div class="col-md-8">
      <div class="card card-custom shadow-sm p-3">
        <form method="POST">
          <!-- form data diri -->
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">No. WhatsApp</label>
              <input type="text" class="form-control" name="wa" placeholder="62812xxxx" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Berangkat</label>
              <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jumlah Orang</label>
              <input type="number" class="form-control" name="orang" id="orang" value="1" min="1" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Metode Bayar</label>
              <select class="form-select" name="metode">
                <option value="Transfer">Transfer</option>
                <option value="Kartu Kredit">Kartu Kredit</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Catatan (opsional)</label>
              <input type="text" class="form-control" name="catatan" placeholder="Request khusus, jadwal, dll">
            </div>
          </div>

          <!-- Pilih Destinasi -->
          <div class="mt-4">
            <h6>Destinasi yang dipilih</h6>
            <div class="row">
              <?php while ($d = mysqli_fetch_assoc($destinasi_q)) { ?>
              <div class="col-12">
                <input type="hidden" name="destinasi" value="<?= $d['id']; ?>">
                <div class="card card-custom p-3 text-center card-active">
                  <h6 class="mb-1"><?= $d['nama']; ?></h6>
                  <p class="text-muted mb-0">Rp<?= number_format($d['harga'], 0, ',', '.'); ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

          <!-- Estimasi & Button -->
          <div class="mt-3">
            <p>Estimasi total: <span class="fw-bold text-primary" id="totalHarga">Rp0</span></p>
            <button type="submit" name="simpan" class="btn-booking">
              <i class="bi bi-cart-check"></i> Booking Online
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Ringkasan -->
    <div class="col-md-4">
      <div class="summary shadow-sm">
        <h6>Ringkasan</h6>
        <p id="ringkasan">
          Destinasi: - <br>
          Tanggal: - <br>
          Orang: 1 <br>
          Metode Bayar: Transfer
        </p>
      </div>
    </div>
  </div>
</div>

<script>
  let harga = parseInt(document.querySelector("input[name='destinasi']")?.parentElement.querySelector("p")?.innerText.replace(/[^\d]/g, "")) || 0;

  document.getElementById("orang").addEventListener("input", updateTotal);
  document.querySelector("select[name='metode']").addEventListener("change", updateRingkasan);
  document.querySelector("input[name='tanggal']").addEventListener("change", updateRingkasan);

  function updateTotal() {
    let orang = parseInt(document.getElementById("orang").value) || 1;
    let total = harga * orang;
    document.getElementById("totalHarga").innerText = "Rp" + total.toLocaleString();
    updateRingkasan();
  }

  function updateRingkasan() {
    let destinasiLabel = document.querySelector(".card-active h6")?.innerText || "-";
    let tanggal = document.querySelector("input[name='tanggal']").value || "-";
    let orang = document.getElementById("orang").value;
    let metode = document.querySelector("select[name='metode']").value;

    document.getElementById("ringkasan").innerHTML =
      "Destinasi: " + destinasiLabel + "<br>" +
      "Tanggal: " + tanggal + "<br>" +
      "Orang: " + orang + "<br>" +
      "Metode Bayar: " + metode;
  }

  updateTotal();
</script>
</body>
</html>
