<?php
include 'Admin/koneksi.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] != "pengunjung") {
    echo "<script>alert('Akses ditolak! Silakan login sebagai pengunjung');location.href='Admin/login.php'</script>";
    exit();
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>69 Travel</title>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<html>
  <!-- Top Info -->
  <div class="top-bar">
    <div class="left-info">69travel@gmail.com</div>
    <div class="right-info">Bandar Lampung, Teluk Betung</div>
  </div>

  <!-- Header Navigation -->
  <header>
    <div class="logo">69 Travel</div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="about.php" class="active">About</a></li>
        <li><a href="blog.php" class="active">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="Admin/logout.php" class="dash">Logout</a></li>
        <!-- <li class="setting-menu">
          <a href="Admin/logout.php" id="settingBtn"><i class="fa fa-cog"></i> Setting</a>
          <ul class="dropdown-menu" id="dropdownMenu">
            <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="Admin/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li> -->
      </ul>
    </nav>
  </header>

    <!-- Hero Section -->
  <section class="hero">
    <div class="hero-overlay">
      <div class="hero-content">
        <h1>Jelajahi Dunia<br>dengan Mudah</h1>
        <p>
          Dapatkan tiket terjangkau untuk Anda di setiap musim tanpa khawatir.<br>
          Kami juga memberikan penawaran khusus untuk perjalanan pulang pergi ke beberapa destinasi,<br>
          agar Anda bisa mendapatkan poin!
        </p>
        <button><a href="store.php">Mulai Sekarang</a></button>
      </div>
      <div class="card-container">
        <div class="destination-card">
          <img src="Gambar/coast island" />
          <div class="card-info">
            <h3>Coast Island</h3>
            <p>Mulai dari 10 jt/pax</p>
          </div>
        </div>
        <div class="destination-card">
          <img src="Gambar/montai.jpeg" />
          <div class="card-info">
            <h3>Explore Mountain</h3>
            <p>Mulai Dari 2,5 jt/pax</p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Tentang Perusahaan Section -->
  <section class="about-section">
  <div class="about-container">
    <div class="about-text">
      <h4 class="highlight">Tentang Perusahaan</h4>
      <h2>Petualangan,<br>Menciptakan Momen</h2>
      <p><strong>Kami menyediakan berbagai paket perjalanan ke luar negeri, sesuai kebutuhan dan gaya traveling kamu.</strong></p>
      <p>
        Mau solo trip, honeymoon, atau group tour? Semuanya bisa.<br>
        Kamu juga bisa request rencana perjalanan custom sesuai keinginan.<br>
        Cukup duduk santai, biarkan kami yang merancang perjalananmu dari awal sampai akhir.”
      </p>
      <p><i>Jelajahi Dunia, Ciptakan Cerita.</i></p>
    </div>
    <div class="about-images">
      <div class="about-card">
        <img src="Gambar/itali.jpeg">
        <div class="about-label">Italy</div>
      </div>
      <div class="about-card">
        <img src="Gambar/Las vegas.jpeg">
        <div class="about-label">Las Vegas</div>
      </div>
    </div>
  </div>
  </section>

    <!-- ===== Bagian Destinasi ===== -->
  <section class="destinasi">
    <h4 class="subjudulll">Jelajahi Top Destinasi</h4>
    <h2 class="judulll">Perjalanan ke Tempat-Tempat Paling Menakjubkan di Dunia</h2>

    <div class="container-badge">
      <div class="card-isi">
        <img src="Gambar/itali bawah.jpeg" alt="Italy">
        <div class="in">
          <span class="badge">8 Tempat</span>
          <h3>Italy</h3>
        </div>
      </div>

      <div class="card-isi">
        <img src="Gambar/nepal.jpeg" alt="Nepal">
        <div class="in">
          <span class="badge">8 Tempat</span>
          <h3>Nepal</h3>
        </div>
      </div>

      <div class="card-isi">
        <img src="Gambar/Las vegas.jpeg" alt="Las Vegas">
        <div class="in">
          <span class="badge">8 Tempat</span>
          <h3>Las Vegas</h3>
        </div>
      </div>

      <div class="card-isi">
        <img src="Gambar/singapure.jpeg" alt="Singapore">
        <div class="in">
          <span class="badge">8 Tempat</span>
          <h3>Singapore</h3>
        </div>
      </div>
    </div>
  </section>

    <!-- Section Counter -->
  <section class="statsts">
    <div class="overlay"></div>
    <div class="statsts-container">
      <div class="star">
        <h2>200</h2>
        <p>Flight Booking</p>
      </div>
      <div class="star">
        <h2>109</h2>
        <p>Amazing Tour</p>
      </div>
      <div class="star">
        <h2>100</h2>
        <p>Cruises Booking</p>
      </div>
      <div class="star">
        <h2>225</h2>
        <p>Hotel Booking</p>
      </div>
    </div>
  </section>

  <!-- Paket treveling -->
  <section class="paket">
    <div class="paket-header">
      <div>
        <h4 class="subjudul">Pengalaman Yang Sering Dijelajahi</h4>
        <h2 class="judul">Perjalanan, Dirancang Khusus <br> untuk Anda</h2>
      </div>
      <a href="store.php" class="btn-paket">Jelajahi Lebih</a>
    </div>

    <div class="paket-container">
      <div class="card-paket">
        <img src="Gambar/jepang.jpeg" alt="Kyoto, Japan">
        <span class="badge-paket">8 Hari 7 Malam</span>
        <h3>Kyoto, Japan</h3>
        <p>Mulai Dari 30 jt/pax</p>
      </div>

      <div class="card-paket">
        <img src="Gambar/matera_itali.jpeg" alt="Matera, Italy">
        <span class="badge-paket">4 Hari 3 Malam</span>
        <h3>Matera, Italy</h3>
        <p>Mulai Dari 35 jt/pax</p>
      </div>

      <div class="card-paket">
        <img src="Gambar/etomia.jpeg" alt="Tallinn, Estonia">
        <span class="badge-paket">12 Hari 11 Malam</span>
        <h3>Tallinn, Estonia</h3>
        <p>Mulai Dari 40 jt/pax</p>
      </div>

      <div class="card-paket">
        <img src="Gambar/veinam.jpeg" alt="Hoi An, Vietnam">
        <span class="badge-paket">7 Hari 6 Malam</span>
        <h3>Hoi An, Vietnam</h3>
        <p>Mulai Dari 20 jt/pax</p>
      </div>
    </div>
  </section>

  <!-- pertalangan kami mempunyai -->
  <section class="pertualangan-section">
    <div class="over-layangan"></div>
    <div class="container-testimial">
      <!-- Bagian Kiri -->
      <div class="left-testimial">
        <p class="subtitle">Dengar Dari Petualang Kami</p>
        <h1 class="title-testimial">Lihat Mengapa Klien <br>Menyukai Kami</h1>
      </div>
      <!-- Bagian Kanan -->
      <div class="right-testimial">
        <div class="card-testimial">
          <p>
            Henry adalah salah satu desainer langka yang menggabungkan keterampilan teknis dengan pemahaman sejati tentang pengalaman pengguna. Ia tidak hanya menghasilkan desain yang indah—ia membantu kami memikirkan perjalanan pengguna dan menyempurnakan setiap detailnya. Produk akhirnya tidak hanya indah tetapi juga sangat intuitif. Ia adalah mitra kreatif sejati.
          </p>
          <div class="author-testimial">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Foto Profil">
            <span>Jonathan Reed</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer bawah -->
  <footer class="footer">
    <div class="footer-container">

      <!-- Kolom 1 -->
      <div class="footer-col">
        <h2>69 Travel</h2>
        <p>
          Di 69 TRAVEL, kami percaya bahwa setiap perjalanan haruslah mulus, 
          menyenangkan, dan tak terlupakan. Sebagai agen perjalanan terpercaya, 
          kami ahli dalam merancang pengalaman perjalanan personal sesuai minat 
          dan preferensi unik Anda.
        </p>
        <div class="footer-social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>

      <!-- Kolom 2 -->
      <div class="footer-col">
        <h3>Destinasi</h3>
        <ul>
          <li><a href="#">Canada</a></li>
          <li><a href="#">Switzerland</a></li>
          <li><a href="#">Norway</a></li>
          <li><a href="#">Japan</a></li>
          <li><a href="#">UK</a></li>
          <li><a href="#">India</a></li>
          <li><a href="#">Nepal</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div class="footer-col">
        <h3>Petualangan</h3>
        <ul>
          <li><a href="#">Diving</a></li>
          <li><a href="#">Rafting</a></li>
          <li><a href="#">Skiing</a></li>
          <li><a href="#">Trekking</a></li>
          <li><a href="#">Hiking</a></li>
          <li><a href="#">Paragliding</a></li>
        </ul>
      </div>

      <!-- Kolom 4 -->
      <div class="footer-col">
        <h3>Informasi</h3>
        <ul>
          <li><a href="#">Miles</a></li>
          <li><a href="#">About US</a></li>
          <li><a href="#">Online Query</a></li>
          <li><a href="#">Become Partner</a></li>
          <li><a href="#">Terms and Condition</a></li>
        </ul>
      </div>

    </div>
    <footer class="fo">
      <div class="footer-blog">
        <p>Copyright @ 2025 69Travel, All Rights Reserved</p>
      </div>
    </footer>
  </footer>
<script>document.addEventListener("DOMContentLoaded", function () {
    const settingBtn = document.getElementById("settingBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    settingBtn.addEventListener("click", function (e) {
        e.preventDefault();
        dropdownMenu.classList.toggle("show");
    });

    document.addEventListener("click", function (e) {
        if (!settingBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.remove("show");
        }
    });
});</script>

  </html>