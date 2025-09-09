<?php
session_start();
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
        <li><a href="index.php">Home</a></li>
        <li><a href="store.php">Destination</a></li>
        <li><a href="about.php" class="active">About</a></li>
        <li><a href="blog.php" class="active">Blog</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-x-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
  </header>
  
  <section class="contact" style="background-color: rgb(214, 219, 219);">
    <div class="contact-grid">

    <!-- Kiri: Info Kontak -->
      <div class="contact-info">
      <h2>Hubungi Kami</h2>
      <p>Ada pertanyaan? Kirim pesan atau kontak langsung via info di bawah.</p>

      <div class="info-item">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
        <div>
          <strong>Alamat</strong>
          <span>Jl. Contoh No. 123, Kota Kamu</span>
        </div>
      </div>

      <div class="info-item">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.62 10.79a15.91 15.91 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V21a1 1 0 01-1 1C10.85 22 2 13.15 2 2a1 1 0 011-1h3.5a1 1 0 011 1c0 1.24.2 2.45.57 3.57a1 1 0 01-.24 1.02l-2.2 2.2z"/></svg>
        <div>
          <strong>Telepon</strong>
          <a href="tel:+6281234567890">+62 812-3456-7890</a>
        </div>
      </div>

      <div class="info-item">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <div>
          <strong>Email</strong>
          <a href="mailto:halo@contoh.com">halo@contoh.com</a>
        </div>
      </div>

      <div class="socials">
        <a class="wa" href="https://wa.me/6281234567890" target="_blank" rel="noopener">WhatsApp</a>
        <a class="ig" href="#" target="_blank" rel="noopener">Instagram</a>
        <a class="fb" href="#" target="_blank" rel="noopener">Facebook</a>
      </div>
      </div>

    <!-- Kanan: Form -->
      <form class="contact-form" action="#" method="post">
      <div class="row">
        <div class="field">
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="Nama lengkap" required>
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="nama@email.com" required>
        </div>
      </div>

      <div class="row">
        <div class="field">
          <label for="telp">No. HP</label>
          <input type="tel" id="telp" name="telp" placeholder="+62xxxxxxxxxxx" pattern="\\+?\\d{9,15}">
        </div>
        <div class="field">
          <label for="subjek">Subjek</label>
          <input type="text" id="subjek" name="subjek" placeholder="Judul pesan" required>
        </div>
      </div>

      <div class="field">
        <label for="pesan">Pesan</label>
        <textarea id="pesan" name="pesan" rows="6" placeholder="Tulis pesan kamu..." required></textarea>
      </div>

      <button type="submit" class="btn-send">Kirim Pesan</button>

      <!-- Opsional: link kirim via WhatsApp (tanpa submit form) -->
      <a class="btn-wa" 
         href="https://wa.me/6281913294811?text=Hallo,%20saya%20ingin%20bertanya%20tentang%20perjalan treveling... " 
         target="_blank" rel="noopener">Kirim via WhatsApp</a>

      </form>
    </div>
  </section>
  <footer class="fo">
    <div class="footer-blog">
      <p>Copyright @ 2025 69Travel, All Rights Reserved</p>
    </div>
  </footer>

