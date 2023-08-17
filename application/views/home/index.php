<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $judul; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/images/'); ?><?= $logo; ?>" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/home/assets/'); ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/home/assets/'); ?>css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SMAN 6 Banjarmasin - v4.9.0
  * Template URL: https://bootstrapmade.com/SMAN 6 Banjarmasin-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:pnBanjarmasin@yahoo.co.id"><?= $email; ?></a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= $telepon; ?></span></i>
      </div>

      <div class="cta d-none d-md-flex align-items-center">
        <a href="<?= base_url('home/pendaftaransiswa'); ?>" class="scrollto">Pendaftaran Siswa</a>&nbsp;&nbsp;&nbsp;
        <a href="<?= base_url('home/pendaftaranguru'); ?>" class="scrollto">Pendaftaran Guru</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="<? base_url('home'); ?>"><?= $nama_profil; ?></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url('assets/home/assets/'); ?>img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pendaftaran</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <!--<li><a class="nav-link scrollto" href="<?= base_url('home/pendaftaran'); ?>">Pendaftaran</a></li>-->
          <li><a class="nav-link scrollto" href="<?= base_url('home/login'); ?>">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Selamat Datang di <?= $nama_profil; ?></h1>
      <h2><?= $judul; ?></h2>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="#about" class="btn-get-started scrollto">Tentang</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h4>SMAN 6 Banjarmasin</h4>
              <p>
                Salah satu satuan pendidikan dengan jenjang Sekolah Menengah Atas Negeri yang ada di Kota Banjarmasin, Kalimantan Selatan.
              </p>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>NPSN : 30304259</h4>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>SK Pendirian : 0260/1980 TGL.30 JULI 1980</h4>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Akreditasi A</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=Bykpivye8i0" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h4 data-aos="fade-up">Tentang</h4>
            <h3 data-aos="fade-up"><?= $profil['nama_profil']; ?></h3>
            <p data-aos="fade-up">SMAN 6 Banjarmasin beralamat di Jl. Belitung Darat No.130 Rt.19 Rw.02 Kelurahan Belitung Utara, Kec. Banjarmasin Barat, Kota Banjarmasin, Prov.Kalsel Kode Pos 70116.</p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Pendaftaran Akun</h2>
          <p data-aos="fade-up">Klik tombol dibawah ini untuk pendaftaran siswa atau guru. <br /></p>
          <p>

          <div class="btn-wrap">
            <a href="<?= base_url('home/pendaftaransiswa'); ?>" class="btn-buy">Pendaftaran Siswa</a></br /></br />
            <a href="<?= base_url('home/pendaftaranguru'); ?>" class="btn-buy">Pendaftaran Guru</a>
          </div>
          </p>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Kontak</h2>
          <p data-aos="fade-up">Silahkan hubungi kontak <?= $nama_profil; ?> untuk informasi lebih lanjut melalui website <a href="<?= 'http://' . $website; ?>"><?= $website; ?></a></p>
        </div>
      </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Alamat</h3>
            <p>
              Jl. Belitung Darat No.130 Rt.19 Rw.02 Kelurahan Belitung Utara, Kec. Banjarmasin Barat, Kota Banjarmasin, Prov.Kalsel Kode Pos 70116 <br><br>
              <strong>Telp:</strong> <?= $telepon; ?><br>
              <strong>Email:</strong> <?= $email; ?><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Terkait</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <center>
              <h4><?= $nama_profil; ?></h4>
              <img src="<?= base_url('assets/dist/img/') . $logo; ?>" height="100" width="80" />
            </center>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span><?= $nama_profil; ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/SMAN 6 Banjarmasin-free-multipurpose-bootstrap-template/ -->
          Designed by <a href="<?= 'http://' . $website; ?>"><?= $nama_profil; ?></a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets/home/assets/'); ?>vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/home/assets/'); ?>js/main.js"></script>

</body>

</html>