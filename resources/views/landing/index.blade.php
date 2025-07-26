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
    <div class="tabs" id="kategori-tabs">
      <button class="tab-btn active" data-kategori="all">Semua</button>
      @foreach($kategoris as $kat)
        <button class="tab-btn" data-kategori="{{ $kat->id }}">{{ $kat->nama_kategori }}</button>
      @endforeach
    </div>
    <div class="menu-grid" id="menu-grid">
      @forelse($menus as $idx => $menu)
        <div class="menu-card"
          data-kategori="{{ $menu->kategori_id }}"
          style="{{ $idx > 7 ? 'display:none;' : '' }}"> {{-- Tampilkan hanya 8 awal --}}
          <img src="{{ asset('storage/'.$menu->foto) }}" alt="Foto {{ $menu->nama_menu }}">
          <div class="info">
            <h3>{{ $menu->nama_menu }}</h3>
            <p>Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
          </div>
        </div>
      @empty
        <div class="menu-card" style="grid-column: span 4;">
          <p>Belum ada data menu.</p>
        </div>
      @endforelse
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

<script>
document.addEventListener('DOMContentLoaded', function() {
  const tabBtns = document.querySelectorAll('.tab-btn');
  const cards   = document.querySelectorAll('.menu-card');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Toggle active class pada tab
      tabBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      const kat = this.dataset.kategori;

      // Reset: Semua menu disembunyikan dulu
      cards.forEach(card => { card.style.display = 'none'; });

      if (kat === 'all') {
        // Tampilkan hanya 8 pertama
        cards.forEach((card, i) => {
          if (i < 8) card.style.display = 'block';
        });
      } else {
        // Tampilkan SEMUA yang kategori sesuai
        let ditemukan = false;
        cards.forEach(card => {
          if (card.dataset.kategori === kat) {
            card.style.display = 'block';
            ditemukan = true;
          }
        });
        // Jika tidak ditemukan
        if (!ditemukan) {
          // Opsional: Bisa tampilkan "Belum ada data menu."
        }
      }
    });
  });
});
</script>



</body>
</html>
