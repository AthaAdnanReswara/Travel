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
    $destinasi_q = mysqli_query($koneksi, "SELECT * FROM destinasi WHERE id='$selected_destinasi_id'");
} else {
    $destinasi_q = mysqli_query($koneksi, "SELECT * FROM destinasi ORDER BY nama ASC");
}

// 🔹 fungsi simpan booking
function simpanBooking($koneksi, $user_id, $destinasi_id, $tanggal, $jumlah_orang, $metode_bayar, $catatan, $penumpang) {
    $h = mysqli_query($koneksi, "SELECT harga FROM destinasi WHERE id='$destinasi_id'");
    $row = mysqli_fetch_assoc($h);
    $harga = $row['harga'];

    $total = $harga * $jumlah_orang;

    $insert = "INSERT INTO booking 
        (user_id, destinasi_id, tanggal, jumlah_orang, metode_bayar, catatan, total, status, created_at) 
        VALUES 
        ('$user_id', '$destinasi_id', '$tanggal', '$jumlah_orang', '$metode_bayar', '$catatan', '$total', 'Pending', NOW())";

    $result = mysqli_query($koneksi, $insert);

    if ($result && !empty($penumpang)) {
        $booking_id = mysqli_insert_id($koneksi);
        foreach ($penumpang as $nama) {
            mysqli_query($koneksi, "INSERT INTO penumpang (booking_id, nama) VALUES ('$booking_id', '".mysqli_real_escape_string($koneksi, $nama)."')");
        }
    }

    return $result;
}

if (isset($_POST['simpan'])) {
    $destinasi_id = $_POST['destinasi'];
    $tanggal = $_POST['tanggal'];
    $jumlah_orang = $_POST['orang'];
    $metode_bayar = $_POST['metode'];
    $catatan = $_POST['catatan'];
    $penumpang = isset($_POST['penumpang']) ? $_POST['penumpang'] : [];

    if (simpanBooking($koneksi, $user_id, $destinasi_id, $tanggal, $jumlah_orang, $metode_bayar, $catatan, $penumpang)) {
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background: #f8fafc; font-family: 'Segoe UI', Tahoma, sans-serif; }
    .card-custom { border-radius: 15px; transition: .3s; }
    .card-custom:hover { transform: scale(1.02); box-shadow: 0 6px 18px rgba(0,0,0,.1); }
    .card-active { border: 2px solid #0077ff; background: #eef6ff; }
    .summary { background: #ffffff; border-radius: 15px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,.05); }
    
    .btn-booking {
      display: inline-block;
      padding: 10px 18px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
      margin: 5px;
      cursor: pointer;
      border: none;
    }
    .btn-booking.wa {
      background: #25d366; color: #fff;
    }
    .btn-booking.wa:hover {
      background: #1ebe5d; transform: translateY(-2px);
    }
    .btn-booking.save {
      background: #0d6efd; color: #fff;
    }
    .btn-booking.save:hover {
      background: #0b5ed7; transform: translateY(-2px);
    }
    .btn-booking.back {
      background: #6c757d; color: #fff;
    }
    .btn-booking.back:hover {
      background: #5a6268; transform: translateY(-2px);
    }
    .form-label { font-weight: 600; }
  </style>
</head>
<body class="p-4">
<div class="container">
  <div class="row">
    <!-- Form Booking -->
    <div class="col-lg-8">
      <div class="card card-custom shadow-sm p-4">
        <form method="POST">
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
            <div id="list-nama" class="col-12 mt-2"></div>
            <div class="col-12">
              <label class="form-label">Catatan (opsional)</label>
              <input type="text" class="form-control" name="catatan" placeholder="Request khusus, jadwal, dll">
            </div>
          </div>

          <!-- Pilih Destinasi -->
          <div class="mt-4">
            <h6 class="fw-bold">Destinasi yang dipilih</h6>
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
            <a id="waLink" target="_blank" class="btn-booking wa">
              <i class="bi bi-whatsapp"></i> Booking via WhatsApp
            </a>

            <button type="submit" name="simpan" class="btn-booking save">
              <i class="bi bi-save"></i> Simpan Booking
            </button>

            <a href="store.php" class="btn-booking back">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Ringkasan -->
    <div class="col-lg-4 mt-3 mt-lg-0">
      <div class="summary">
        <h6 class="fw-bold"><i class="bi bi-receipt"></i> Ringkasan</h6>
        <p id="ringkasan">
          Destinasi: - <br>
          Tanggal: - <br>
          Orang: 1 <br>
          Metode Bayar: Transfer <br>
          Total: Rp0
        </p>
        <p id="totalHarga" class="fw-bold text-primary"></p>
      </div>
    </div>
  </div>
</div>

<script>
  let harga = parseInt(document.querySelector("input[name='destinasi']")?.parentElement.querySelector("p")?.innerText.replace(/[^\d]/g, "")) || 0;

  const orangInput = document.getElementById("orang");
  const listNama = document.getElementById("list-nama");
  const waLink = document.getElementById("waLink");
  const waNumber = "628984287905"; // ganti dengan nomor WA admin

  orangInput.addEventListener("input", () => {
    updateTotal();
    generateNamaFields();
  });

  function generateNamaFields() {
    listNama.innerHTML = "";
    let jumlah = parseInt(orangInput.value) || 0;

    if (jumlah > 1) {
      for (let i = 1; i <= jumlah; i++) {
        let div = document.createElement("div");
        div.classList.add("mb-2");
        div.innerHTML = `
          <label class="form-label">Nama Penumpang ${i}</label>
          <input type="text" class="form-control" name="penumpang[]" required>
        `;
        listNama.appendChild(div);
      }
    }
  }

  function updateTotal() {
    let orang = parseInt(orangInput.value) || 1;
    let total = harga * orang;
    document.getElementById("totalHarga").innerText = "Rp" + total.toLocaleString();
    updateRingkasan();
    updateWALink();
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

  function updateWALink() {
    let destinasiLabel = document.querySelector(".card-active h6")?.innerText || "-";
    let tanggal = document.querySelector("input[name='tanggal']").value || "-";
    let orang = document.getElementById("orang").value;
    let metode = document.querySelector("select[name='metode']").value;
    let nama = document.querySelector("input[name='nama']").value || "-";
    let waUser = document.querySelector("input[name='wa']").value || "-";

    // kumpulkan nama penumpang
    let penumpangInputs = document.querySelectorAll("input[name='penumpang[]']");
    let penumpangList = "";
    penumpangInputs.forEach((el, i) => {
      penumpangList += `%0A- ${el.value}`;
    });

    let pesan = `Halo Admin, saya ingin booking travel:%0A
*Nama:* ${nama}%0A
*No. WA:* ${waUser}%0A
*Destinasi:* ${destinasiLabel}%0A
*Tanggal:* ${tanggal}%0A
*Jumlah Orang:* ${orang}%0A
*Metode Bayar:* ${metode}%0A
*Penumpang:* ${penumpangList}`;

    waLink.href = `https://wa.me/${waNumber}?text=${pesan}`;
  }

  document.querySelectorAll("input, select").forEach(el => {
    el.addEventListener("input", updateWALink);
  });

  updateTotal();
  updateWALink();
</script>
</body>
</html>
