<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Terajeh Coffee & Steak House</title>
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>

  {{-- Header --}}
  <header class="site-header">
    <div class="logo">
      <img src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh Logo">
    </div>
    <nav>
      <ul>
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Lokasi</a></li>
      </ul>
    </nav>
    <a href="#reserve" class="btn-reserve">Reservasi</a>
  </header>

  {{-- Hero --}}
  <section id="hero" class="hero">
    <img src="{{ asset('assets/img/hero.png') }}" alt="Hero Steak">
    <div class="cta">
      <h1>Terajeh</h1>
      <button class="btn">Reservasi Sekarang</button>
    </div>
  </section>

  {{-- About --}}
  <section id="about" class="about container">
    <div class="subtitle">SEJAK 2015</div>
    <div class="title">Ten Years Still Grilling</div>
    <p>
      Terajeh Coffee & Steak House adalah tempat di mana kopi spesial dan steak lezat
      berpadu sempurna dalam suasana hangat yang mengundang…
    </p>
    <div class="gallery">
      <img src="https://placehold.co/398x531" alt="">
      <img src="https://placehold.co/397x531" alt="">
      <img src="https://placehold.co/397x531" alt="">
    </div>
  </section>

  {{-- Menu --}}
  <section id="menu" class="menu-section">
    <div class="container">
      <h2>MENU KAMI</h2>
      <div class="tabs">
        <button class="active">Steak</button>
        <button>Indonesian Food</button>
        <button>Pasta dan Snack</button>
        <button>Cheese</button>
        <button>Dessert</button>
        <button>Drink</button>
      </div>
      <div class="menu-grid">
        {{-- contoh item --}}
        <div class="menu-item">
          <img src="https://placehold.co/292x292" alt="Grilled Chicken">
          <div class="info">
            <h3>Grilled Chicken</h3>
            <p>Rp 57.500</p>
          </div>
        </div>
        {{-- ulangi sesuai data --}}
      </div>
    </div>
  </section>

  {{-- Steak Doneness --}}
  <section class="doneness">
    <div class="container">
      <h2>TINGKAT KEMATANGAN STEAK</h2>
      <div class="img-wrap">
        <img src="https://placehold.co/1030x654" alt="Doneness Guide">
      </div>
    </div>
  </section>

  {{-- CTA Strip --}}
  <section id="reserve" class="cta-strip">
    <p>Mau tempat nyaman dan makanan lezat? Reservasi sekarang, jangan tunggu lama!</p>
    <a href="#hero" class="btn">Reservasi Sekarang</a>
  </section>

  {{-- Contact & Location --}}
  <section id="contact" class="contact container">
    <h2>KONTAK DAN LOKASI</h2>
    <div class="cards">
      <div class="card">
        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
        <h3>Lokasi</h3>
        <p>Jl. Merdeka No. 57,<br>Lemahwungkuk, Kota Cirebon</p>
      </div>
      <div class="card">
        <div class="icon"><i class="fab fa-whatsapp"></i></div>
        <h3>WhatsApp</h3>
        <p>0821 1494 1212</p>
      </div>
      <div class="card">
        <div class="icon"><i class="fab fa-instagram"></i></div>
        <h3>Instagram</h3>
        <p>@terajeh_coffee</p>
      </div>
      <div class="card">
        <div class="icon"><i class="fas fa-envelope"></i></div>
        <h3>E-mail</h3>
        <p>terajeh_coffee@gmail.com</p>
      </div>
    </div>
    <div class="map">
      <!-- ganti dengan embed Google Maps -->
      <iframe src="https://maps.google.com/…" width="100%" height="100%" frameborder="0"></iframe>
    </div>
  </section>

  {{-- Operational Hours --}}
  <section class="hours">
    <div class="container">
      <h2>JAM OPERASIONAL</h2>
      <div class="row">
        <div class="col">
          <b>11.00 – 21.00 WIB</b>
          Minggu – Jumat
        </div>
        <div class="col">
          <b>11.00 – 22.00 WIB</b>
          Sabtu
        </div>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <footer class="site-footer">
    <div class="logo"><img src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh"></div>
    <nav>
      <ul>
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Lokasi</a></li>
      </ul>
    </nav>
    <div class="social">
      <img src="{{ asset('assets/img/logo-halal.png') }}" alt="Halal">
      <img src="{{ asset('img/your-instagram-icon.png') }}" alt="IG">
    </div>
    <p>#SteaknyaRasaIndonesia</p>
  </footer>

</body>
</html>
