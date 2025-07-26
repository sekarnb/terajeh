<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Terajeh Coffee & Steak House</title>
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
  <img src="{{ asset('assets/img/hero.png') }}" alt="Hero Steak" class="hero-bg">
  <div class="hero-gradient"></div>
  <div class="hero-gradient-bottom"></div>
  <div class="cta">
    <img src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh Logo" class="logo-cta">
    <button class="btn-cta">Reservasi Sekarang</button>
  </div>
</section>


  {{-- About --}}
  <section id="about" class="about container">
    <div class="subtitle">SEJAK 2015</div>
    <div class="title">Ten Years Still Grilling</div>
    <p>
      Terajeh Coffee & Steak House adalah tempat di mana kopi spesial dan steak lezat berpadu sempurna dalam suasana hangat yang mengundang kamu untuk bersantai dan menikmati momen istimewa bersama keluagra maupun teman. Dengan bahan berkualitas dan cita rasa autentik, setiap sajian kami dirancang untuk memanjakan lidah sekaligus menciptakan pengalaman kuliner yang tak terlupakan.
    </p>
    <div class="gallery">
      <img src="{{ asset('assets/img/about-1.jpeg') }}" alt="About-1">
      <img src="{{ asset('assets/img/about-2.jpeg') }}" alt="About-2">
      <img src="{{ asset('assets/img/about-3.jpeg') }}" alt="About-3">
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

{{-- Tingkat Kematangan Steak --}}
<section class="doneness">
  <h2>TINGKAT KEMATANGAN STEAK</h2>
  <div class="img-wrap">
    <img src="{{ asset('assets/img/doneness.jpeg') }}" alt="Tingkat Kematangan Steak">
  </div>
</section>

  {{-- CTA Strip --}}
  <section id="reserve" class="cta-strip">
    <p>Mau tempat nyaman dan makanan lezat? Reservasi sekarang, jangan tunggu lama!</p>
    <a href="#reserve" class="btn">Reservasi Sekarang</a>
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
        <div class="icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
        <h3>WhatsApp</h3>
        <a href="https://wa.me/6282114941212" target="_blank">0821 1494 1212</a>
      </div>
      <div class="card">
        <div class="icon"><i class="fab fa-instagram"></i></div>
        <h3>Instagram</h3>
        <a href="https://instagram.com/terajeh_coffee" target="_blank">@terajeh_coffee</a>
      </div>
      <div class="card">
        <div class="icon"><i class="fas fa-envelope"></i></div>
        <h3>E-mail</h3>
        <p>terajeh_coffee@gmail.com</p>
      </div>
    </div>
    <div class="map">
      <!-- ganti dengan embed Google Maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.350186855352!2d108.56876157499634!3d-6.72354939332724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2809414bafd%3A0x534feda7aa067f30!2sTerajeh%20Coffee%20and%20Steak%20House!5e0!3m2!1sid!2sid!4v1721982039138!5m2!1sid!2sid" width="100%" height="100%" frameborder="0"></iframe>
    </div>
  </section>

  {{-- Operational Hours --}}
<section class="hours">
  <h2>JAM OPERASIONAL</h2>
  <div class="hours-table">
    <div class="row">
      <div class="col time">11.00 - 21.00 WIB</div>
      <div class="col day">Minggu - Jum’at</div>
    </div>
    <div class="row">
      <div class="col time">11.00 - 22.00 WIB</div>
      <div class="col day">Sabtu</div>
    </div>
  </div>
</section>


  {{-- Footer --}}
<footer class="site-footer">
  <div class="footer-left">
    <div class="footer-address">
      <p>Jl. Merdeka No. 57, Lemahwungkuk, Kota Cirebon</p>
      <a href="https://wa.me/6282114941212" target="_blank">0821 1494 1212</a>
    </div>
    <div class="footer-tagline">#SteaknyaRasaIndonesia</div>
  </div>
  <div class="footer-center">
    <ul class="footer-menu">
      <li><a href="#hero">Beranda</a></li>
      <li><a href="#about">Tentang</a></li>
      <li><a href="#menu">Menu</a></li>
      <li><a href="#contact">Lokasi</a></li>
    </ul>
  </div>
  <div class="footer-right">
    <img src="{{ asset('assets/img/logo-white.png') }}" alt="Terajeh" class="footer-logo">
    <img src="{{ asset('assets/img/logo-halal.png') }}" alt="Halal Indonesia" class="footer-halal">
  </div>
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
