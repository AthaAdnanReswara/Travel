<?php
include 'Admin/koneksi.php';
session_start();

// Query ambil semua destinasi
$sql = "SELECT * FROM destinasi ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>69 Travel</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {margin:0; padding:0; box-sizing:border-box;}
    body {background:#f8fafc; font-family: 'Segoe UI', sans-serif;}

    /* Top bar */
    .top-bar {
      background-color: #007d8c;
      color: #fff;
      padding: 5px 10px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }

    /* Header */
    header {
      background-color: #fff;
      padding: 12px 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: #000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.08);
    }
    .logo {font-size: 20px; font-weight: bold; color: #007d8c;}

    /* Nav kanan */
    nav ul {
      display: flex;
      list-style: none;
      gap: 15px;
      margin-bottom: 0;
      align-items: center;
    }
    nav ul li a {
      color: #0f172a;
      font-weight: 500;
      padding: 8px 14px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: all 0.3s ease;
    }
    nav ul li a:hover {
      background: #007d8c;
      color: #fff;
    }
    .btn-login {
      background: #007d8c;
      color: #fff !important;
      font-weight: bold;
    }
    .btn-home {
      background: #facc15;
      color: #000 !important;
      font-weight: bold;
    }

    .social-icons a {
      margin-left: 10px;
      color: #475569;
      font-size: 18px;
      transition: 0.3s;
    }
    .social-icons a:hover {color:#007d8c;}

    /* Section Title */
    h2.section-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 40px;
      color: #007d8c;
      text-align: center;
      position: relative;
    }
    h2.section-title::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #007d8c;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    /* Card Produk */
    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.4s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
    .card img {transition: transform 0.4s ease;}
    .card:hover img {transform: scale(1.08);}
    .btn-warning {
      border-radius: 25px;
      font-weight: bold;
    }

    /* Footer */
    footer {
      background: #0f172a;
      color: #94a3b8;
      padding: 30px 20px;
      margin-top: 50px;
    }
    footer a {color: #22d3ee; text-decoration: none;}
    footer a:hover {color: #38bdf8;}

    /* Tombol WhatsApp */
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25D366;
      color: white;
      border-radius: 50px;
      padding: 12px 18px;
      font-size: 16px;
      font-weight: 600;
      display: flex;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      z-index: 1000;
      text-decoration: none;
      transition: 0.3s;
    }
    .whatsapp-float i {font-size: 22px; margin-right: 8px;}
    .whatsapp-float:hover {background-color: #20b955;}

    /* Animasi Fade In */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
    }
    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <!-- Top Info -->
  <div class="top-bar">
    <div class="left-info"><i class="fa-solid fa-envelope"></i> 69travel@gmail.com</div>
    <div class="right-info"><i class="fa-solid fa-location-dot"></i> Bandar Lampung, Teluk Betung</div>
  </div>

  <!-- Header Navigation -->
  <header>
    <div class="logo"><i class="fa-solid fa"></i> 69 Travel</div>
    <nav>
      <ul>
        <?php if (isset($_SESSION['user'])) { ?>
          <li><a href="Admin/logout.php" class="btn-login"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        <?php } else { ?>
          <li><a href="Admin/login.php" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
        <?php } ?>
        <li><a href="index.php" class="btn-home"><i class="fa-solid fa-house"></i> Home</a></li>
      </ul>
    </nav>
  </header>

  <!-- Section Paket -->
  <div class="container py-5">
    <h2 class="section-title">Paket Wisata Populer</h2>
    <div class="row g-4">
      <?php 
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) { 
        $i++;
        $hidden = $i > 8 ? "d-none card-item" : "";
      ?>
      <div class="col-md-6 col-lg-3 fade-in <?php echo $hidden; ?>">
        <div class="card h-100">
          <img src="gambar/<?php echo $row['gambar']; ?>" class="img-fluid" style="object-fit:cover; height:200px;" alt="<?php echo $row['nama']; ?>">
          <div class="card-body">
            <h5 class="fw-bold text-primary">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h5>
            <p class="fw-semibold mb-1"><?php echo $row['nama']; ?></p>
            <button class="btn btn-warning w-100" data-bs-toggle="modal"
              data-bs-target="#modalDestinasi<?php echo $row['id']; ?>">
              LIHAT
            </button>
          </div>
        </div>
      </div>

     <!-- Modal Detail Compact -->
<div class="modal fade" id="modalDestinasi<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;"> <!-- Lebar dibatasi -->
    <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">
      
      <!-- Header -->
      <div class="modal-header text-white py-2" style="background: linear-gradient(90deg, #007d8c, #00bcd4);">
        <h6 class="modal-title fw-bold mb-0">
          <i class="fa-solid fa-map-location-dot"></i> <?php echo $row['nama']; ?>
        </h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body px-3 py-3">
        <img class="img-fluid rounded-3 shadow-sm mb-2" 
             src="gambar/<?php echo $row['gambar']; ?>" 
             alt="<?php echo $row['nama']; ?>" 
             style="width:100%; max-height:180px; object-fit:cover;">

        <!-- Harga -->
        <div class="p-2 mb-2 text-center bg-light rounded-3 shadow-sm small">
          <h6 class="fw-bold text-primary mb-1">
            <i class="fa-solid fa-tags"></i> Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
          </h6>
          <small class="text-muted"><i class="fa-regular fa-calendar"></i> Berangkat: 31 Maret 2025</small>
        </div>

        <!-- Deskripsi -->
        <p class="text-secondary small lh-base mb-0" style="text-align: justify;">
          <?php echo $row['deskripsi']; ?>
        </p>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 d-flex justify-content-between px-3 pb-3">
        <?php if (!isset($_SESSION['user'])) { ?>
          <button class="btn btn-success btn-sm fw-bold px-3" data-bs-toggle="modal"
            data-bs-target="#modalLogin" data-bs-dismiss="modal">
            <i class="fa-solid fa-ticket"></i> Pesan
          </button>
        <?php } else { ?>
          <a href="pesan.php?destinasi=<?= $row['id'] ?>" class="btn btn-success btn-sm fw-bold px-3">
            <i class="fa-solid fa-ticket"></i> Pesan
          </a>
        <?php } ?>
        <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-dismiss="modal">
          <i class="fa-solid fa-xmark"></i> Tutup
        </button>
      </div>
    </div>
  </div>
</div>
      <?php } ?>
    </div>

    <!-- Tombol Expand -->
    <div class="text-center mt-4">
      <button id="expandBtn" class="btn btn-primary rounded-pill px-4"><i class="fa-solid fa-circle-down"></i> Lihat Lebih Banyak</button>
    </div>
  </div>

  <!-- Modal Login -->
  <div class="modal fade" id="modalLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Login Dulu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">Anda harus login terlebih dahulu untuk memesan paket wisata.</p>
          <div class="text-center">
            <a href="Admin/login.php" class="btn btn-success fw-bold">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tombol WhatsApp -->
  <a href="https://wa.me/6281913204811?text=Hallo,%20saya%20ingin%20memesan%20tiket%20perjalanan%20treveling..." target="_blank" rel="noopener" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i> Live Chat
  </a>

  <!-- Footer -->
  <footer>
    <p class="text-center mb-0">Copyright © 2025 69Travel, All Rights Reserved</p>
  </footer>

  <!-- Script Expand -->
  <script>
    const expandBtn = document.getElementById('expandBtn');
    const hiddenCards = document.querySelectorAll('.card-item');
    let expanded = false;

    expandBtn.addEventListener('click', () => {
      if (!expanded) {
        hiddenCards.forEach(card => card.classList.remove('d-none'));
        expandBtn.innerHTML = '<i class="fa-solid fa-circle-up"></i> Sembunyikan';
        expanded = true;
      } else {
        hiddenCards.forEach(card => card.classList.add('d-none'));
        expandBtn.innerHTML = '<i class="fa-solid fa-circle-down"></i> Lihat Lebih Banyak';
        expanded = false;
      }
    });

    // Animasi Fade Scroll
    const faders = document.querySelectorAll('.fade-in');
    const appearOnScroll = new IntersectionObserver((entries, observer)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          entry.target.classList.add('show');
          observer.unobserve(entry.target);
        }
      });
    }, {threshold: 0.2});
    faders.forEach(fader=>appearOnScroll.observe(fader));
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
