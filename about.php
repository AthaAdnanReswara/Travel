<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>69 Travel - About</title>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      background: #f4f7f9;
      color: #333;
      scroll-behavior: smooth;
    }

    /* Smooth fade animation base */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }

    /* Hero Section */
    .hero {
      position: relative;
      height: 70vh;
      background: url('gambar/itali.jpeg');
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
      overflow: hidden;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.55);
    }
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 800px;
      padding: 20px;
      animation: fadeDown 1.2s ease forwards;
    }
    @keyframes fadeDown {
      0% {opacity: 0; transform: translateY(-40px);}
      100% {opacity: 1; transform: translateY(0);}
    }
    .hero-content h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: bold;
    }
    .hero-content p {
      font-size: 1.2rem;
      line-height: 1.8;
      margin-bottom: 25px;
    }
    .hero-content a {
      display: inline-block;
      padding: 12px 30px;
      background: #009688;
      color: #fff;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
      transition: all 0.4s ease;
    }
    .hero-content a:hover {
      background: #00796b;
      transform: scale(1.08);
    }

    /* About Section */
    .about-section {
      max-width: 1100px;
      margin: auto;
      padding: 80px 20px;
      text-align: center;
    }
    .about-section h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #222;
      transition: color 0.3s ease;
    }
    .about-section h2:hover { color: #009688; }
    .about-section p {
      font-size: 1.1rem;
      line-height: 1.9;
      color: #555;
      max-width: 850px;
      margin: auto;
      transition: all 0.4s ease;
    }

    /* Cards */
    .card-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      max-width: 1200px;
      margin: 60px auto;
      padding: 0 20px;
    }
    .card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px 25px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      text-align: center;
      transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
                  box-shadow 0.4s ease;
      position: relative;
      overflow: hidden;
    }
    .card::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(120deg, transparent, rgba(0,150,136,0.1), transparent);
      transform: rotate(25deg);
      transition: 0.6s ease;
    }
    .card:hover::before {
      left: -30%;
      top: -30%;
    }
    .card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    }
    .icon-box {
      font-size: 2.8rem;
      margin-bottom: 20px;
      color: #009688;
      transition: transform 0.3s ease;
    }
    .card:hover .icon-box { transform: rotate(10deg) scale(1.1); }
    .card h3 {
      margin-bottom: 15px;
      font-size: 1.5rem;
      color: #222;
    }
    .card p {
      font-size: 1rem;
      line-height: 1.7;
      color: #555;
    }

    /* Footer */
    footer {
      background: #111;
      color: #bbb;
      text-align: center;
      padding: 25px 0;
      margin-top: 40px;
    }
    footer p {
      margin: 0;
      font-size: 0.95rem;
    }
  </style>
</head>
  
<body>
  <!-- Top Info -->
  <div class="top-bar">
    <div class="left-info">69travel@web.com</div>
    <div class="right-info">Bandar Lampung, Teluk Betung</div>
  </div>

  <!-- Header -->
  <header>
    <div class="logo">69 Travel</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="store.php">Destination</a></li>
        <li><a href="#">About</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-x-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero">
    <div class="hero-content">
      <h1>Kenali Lebih Dekat 69 Travel</h1>
      <p>Kami bukan sekadar penyedia layanan perjalanan — kami adalah sahabat setia dalam setiap langkah petualanganmu. Dari destinasi eksotis hingga pengalaman autentik, semua kami siapkan untukmu.</p>
      <a href="store.php">Mulai Perjalananmu</a>
    </div>
  </section>

  <!-- About -->
  <section class="about-section fade-in">
    <h2>Tentang Kami</h2>
    <p>
      <b>69 Travel</b> hadir dengan tujuan mengubah setiap perjalanan menjadi cerita luar biasa.  
      Dengan dukungan jaringan global, mitra terpercaya, dan tim profesional, kami menghadirkan pengalaman liburan yang penuh makna — baik itu <i>family trip</i>, honeymoon romantis, ataupun petualangan ekstrem.  
      <br><br>
      Kami percaya: <b>perjalanan terbaik bukan hanya tentang tempat, tapi tentang kenangan yang tercipta</b>. ✨
    </p>
  </section>

  <!-- Cards -->
  <section class="card-section">
    <div class="card fade-in">
      <div class="icon-box"><i class="fas fa-check-circle"></i></div>
      <h3>Misi Kami</h3>
      <p>Memberikan pengalaman perjalanan yang <b>aman</b>, <b>nyaman</b>, dan <b>berkesan</b>. Kami ingin memastikan setiap momen terasa istimewa dan setiap detail diperhatikan dengan sepenuh hati.</p>
    </div>

    <div class="card fade-in">
      <div class="icon-box"><i class="fas fa-bullseye"></i></div>
      <h3>Visi Kami</h3>
      <p>Menjadi travel partner terpercaya yang menghubungkan dunia dengan wisatawan. Kami ingin menginspirasi setiap orang untuk menjelajah lebih jauh, menemukan keajaiban baru, dan membuka perspektif hidup.</p>
    </div>

    <div class="card fade-in">
      <div class="icon-box"><i class="fas fa-users"></i></div>
      <h3>Tim Kami</h3>
      <p>Kami adalah tim profesional dengan passion tinggi dalam dunia perjalanan. Bagi kami, setiap pelanggan adalah keluarga — dan keluarga layak mendapatkan pengalaman terbaik.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>Copyright © 2025 69Travel, All Rights Reserved</p>
  </footer>

  <script>
    // Fade-in saat scroll
    const faders = document.querySelectorAll('.fade-in');
    const appearOptions = { threshold: 0.2 };

    const appearOnScroll = new IntersectionObserver(function(entries, observer){
      entries.forEach(entry => {
        if(entry.isIntersecting){
          entry.target.classList.add('show');
          observer.unobserve(entry.target);
        }
      });
    }, appearOptions);

    faders.forEach(fader => {
      appearOnScroll.observe(fader);
    });
  </script>
</body>
</html>
