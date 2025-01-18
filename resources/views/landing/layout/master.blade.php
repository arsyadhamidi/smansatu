<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Landing | SMAN 1 Bukittinggi</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('landing/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Shuffle
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('images/logo.png') }}" alt="">
                <h1 class="sitename">SMAN 1 Bukittinggi</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Layanan Kami</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                    <li><a href="{{ route('login') }}" class="btn btn-success text-white btn-sm">Masuk / Daftar</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                <div class="carousel-item active">
                    <img src="{{ asset('images/background-landing.jpg') }}" alt="Background Image 1">
                    <div class="carousel-container">
                        <h2>Selamat Datang di SMAN 1 Bukittinggi</h2>
                        <p>
                            Temukan potensi terbaikmu dan raih impian bersama kami. Bergabunglah dalam perjalanan
                            pendidikan yang inspiratif dan penuh prestasi.
                        </p>
                        <a href="{{ route('login') }}" class="btn-get-started">Masuk / Daftar</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('landing/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="Background Image 2">
                    <div class="carousel-container">
                        <h2>Generasi Unggul untuk Masa Depan</h2>
                        <p>
                            Di sini, kami membentuk generasi unggul yang siap menghadapi tantangan masa depan. Mari
                            bersama-sama menciptakan pengalaman belajar yang tak terlupakan.
                        </p>
                        <a href="{{ route('login') }}" class="btn-get-started">Masuk / Daftar</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('landing/assets/img/hero-carousel/hero-carousel-2.jpg') }}" alt="Background Image 3">
                    <div class="carousel-container">
                        <h2>Langkah Menuju Kesuksesan</h2>
                        <p>
                            Bersama kami, setiap langkah menuju kesuksesan dimulai. Bergabunglah dan jadilah bagian dari
                            komunitas yang mendukung dan memotivasi.
                        </p>
                        <a href="{{ route('login') }}" class="btn-get-started">Masuk / Daftar</a>
                    </div>
                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
                <p>SMAN 1 Bukittinggi adalah lembaga pendidikan yang berkomitmen untuk menciptakan generasi unggul
                    melalui pendidikan berkualitas, pengembangan karakter, dan lingkungan belajar yang inspiratif.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('images/background-landing.jpg') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Selamat Datang di SMAN 1 Bukittinggi</h3>
                        <p class="fst-italic">
                            SMAN 1 Bukittinggi adalah salah satu sekolah menengah atas terkemuka di Sumatera Barat, yang
                            berdedikasi untuk memberikan pendidikan berkualitas tinggi kepada generasi muda. Dengan visi
                            untuk menciptakan individu yang cerdas, berkarakter, dan siap menghadapi tantangan global,
                            kami berkomitmen untuk menyediakan lingkungan belajar yang inspiratif dan mendukung.
                        </p>
                        <p>
                            Sejak didirikan, SMAN 1 Bukittinggi telah berusaha untuk menjadi lembaga pendidikan yang
                            tidak hanya fokus pada aspek akademik, tetapi juga pada pengembangan karakter dan
                            keterampilan sosial siswa. Kami percaya bahwa pendidikan yang holistik adalah kunci untuk
                            membentuk generasi yang tidak hanya cerdas secara intelektual, tetapi juga memiliki empati
                            dan kepedulian terhadap lingkungan sekitar.
                        </p>
                        <p>
                            Dengan fasilitas yang modern dan tenaga pengajar yang berpengalaman, kami menawarkan
                            berbagai program akademik dan ekstrakurikuler yang dirancang untuk memenuhi kebutuhan dan
                            minat siswa. Kami memiliki berbagai kegiatan seperti olahraga, seni, dan organisasi siswa
                            yang memungkinkan siswa untuk mengembangkan bakat dan minat mereka di luar kelas.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Pengajaran yang berkualitas dengan pendekatan
                                    yang inovatif dan interaktif.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Fasilitas lengkap yang mendukung proses
                                    belajar mengajar, termasuk laboratorium, perpustakaan, dan ruang serbaguna.</span>
                            </li>
                            <li><i class="bi bi-check-circle"></i> <span>Program ekstrakurikuler yang beragam untuk
                                    mengembangkan keterampilan sosial dan kepemimpinan siswa.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Komitmen terhadap nilai-nilai moral dan etika
                                    dalam setiap aspek pendidikan.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Kerjasama dengan orang tua dan masyarakat
                                    untuk menciptakan lingkungan belajar yang kondusif.</span></li>
                        </ul>
                        <p>
                            Kami juga aktif dalam berbagai kompetisi akademik dan non-akademik, yang tidak hanya
                            meningkatkan prestasi siswa tetapi juga membangun rasa percaya diri dan semangat kompetisi
                            yang sehat. Dengan dukungan dari alumni yang sukses dan masyarakat, SMAN 1 Bukittinggi terus
                            berupaya untuk meningkatkan kualitas pendidikan dan memberikan kontribusi positif bagi
                            masyarakat.
                        </p>
                        <p>
                            Bergabunglah dengan kami di SMAN 1 Bukittinggi, di mana setiap siswa memiliki kesempatan
                            untuk tumbuh dan berkembang menjadi individu yang siap menghadapi masa depan. Mari
                            bersama-sama menciptakan pengalaman belajar yang tak terlupakan dan membangun masa depan
                            yang lebih baik.
                        </p>
                        <a href="#" class="read-more"><span>Baca Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-person-check"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1200"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Jumlah Siswa</strong> <span>yang berprestasi</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-person-lines-fill"></i>
                            <span data-purecounter-start="0" data-purecounter-end="75" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Jumlah Guru</strong> <span>yang berpengalaman</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-grid-1x2"></i>
                            <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Jumlah Kelas</strong> <span>yang tersedia</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-file-earmark-text"></i>
                            <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Jumlah Jurusan</strong> <span>yang ditawarkan</span></p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <p>Berbagai layanan pendidikan dan pengembangan untuk mendukung kesuksesan siswa kami.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-book icon"></i></div>
                            <h4><a href="" class="stretched-link">Kegiatan Belajar Mengajar</a></h4>
                            <p>Program pembelajaran yang inovatif dan interaktif untuk meningkatkan pemahaman siswa.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-person-check icon"></i></div>
                            <h4><a href="" class="stretched-link">Bimbingan Konseling</a></h4>
                            <p>Layanan bimbingan untuk membantu siswa dalam pengembangan diri dan pemecahan masalah.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-people icon"></i></div>
                            <h4><a href="" class="stretched-link">Ekstrakurikuler</a></h4>
                            <p>Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa di luar
                                akademik.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-award icon"></i></div>
                            <h4><a href="" class="stretched-link">Prestasi Siswa</a></h4>
                            <p>Program penghargaan untuk siswa berprestasi dalam akademik maupun non-akademik.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                            <p>
                                Berikut adalah beberapa pertanyaan yang sering diajukan mengenai SMAN 1 Bukittinggi.
                                Jika Anda memiliki pertanyaan lain, jangan ragu untuk menghubungi kami.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Bagaimana cara mendaftar di SMAN 1
                                        Bukittinggi?</span></h3>
                                <div class="faq-content">
                                    <p>Untuk mendaftar, Anda dapat mengunjungi website resmi kami dan mengikuti petunjuk
                                        pendaftaran yang tersedia. Pastikan untuk menyiapkan dokumen yang diperlukan.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Apa saja jurusan yang ditawarkan di SMAN 1
                                        Bukittinggi?</span></h3>
                                <div class="faq-content">
                                    <p>SMAN 1 Bukittinggi menawarkan beberapa jurusan, termasuk IPA, IPS, dan Bahasa.
                                        Setiap jurusan dirancang untuk memenuhi kebutuhan akademik siswa.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>Apakah ada kegiatan ekstrakurikuler di
                                        sekolah?</span></h3>
                                <div class="faq-content">
                                    <p>Ya, kami memiliki berbagai kegiatan ekstrakurikuler, termasuk olahraga, seni, dan
                                        organisasi siswa, yang bertujuan untuk mengembangkan bakat dan minat siswa.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>Bagaimana sistem bimbingan konseling di SMAN 1
                                        Bukittinggi?</span></h3>
                                <div class="faq-content">
                                    <p>Kami memiliki layanan bimbingan konseling yang siap membantu siswa dalam
                                        pengembangan diri, pemecahan masalah, dan perencanaan karir.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">5.</span> <span>Apakah ada program beasiswa untuk siswa
                                        berprestasi?</span></h3>
                                <div class="faq-content">
                                    <p>Ya, SMAN 1 Bukittinggi menyediakan program beasiswa bagi siswa berprestasi baik
                                        di bidang akademik maupun non-akademik. Informasi lebih lanjut dapat diperoleh
                                        di kantor sekolah.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <p>Jika Anda memiliki pertanyaan atau ingin mendapatkan informasi lebih lanjut, silakan hubungi kami.
                </p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>Jl. Raya Pendidikan No. 1</p>
                                    <p>Bukittinggi, Sumatera Barat</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Hubungi Kami</h3>
                                    <p>+62 1234 5678</p>
                                    <p>+62 9876 5432</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Kami</h3>
                                    <p>info@sman1bukittinggi.sch.id</p>
                                    <p>contact@sman1bukittinggi.sch.id</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="500">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Buka</h3>
                                    <p>Senin - Jumat</p>
                                    <p>08:00 - 16:00 WIB</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                    <div class="col-lg-12">
                        <div class="mb-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d351.7561643789105!2d100.37389441967822!3d-0.3030867473403105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd538983b7d33b3%3A0x13367126834d50a2!2sSMAN%201%20Bukittinggi!5e1!3m2!1sen!2sid!4v1737174173090!5m2!1sen!2sid"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">SMAN 1 Bukittinggi</span>
                    </a>
                    <p>SMAN 1 Bukittinggi berkomitmen untuk memberikan pendidikan berkualitas tinggi dan membentuk
                        generasi yang cerdas dan berkarakter. Bergabunglah dengan kami untuk menciptakan masa depan yang
                        lebih baik.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://twitter.com/yourprofile" target="_blank"><i class="bi bi-twitter"></i></a>
                        <a href="https://facebook.com/yourprofile" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com/yourprofile" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://linkedin.com/in/yourprofile" target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Tautan Berguna</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat dan Ketentuan</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Layanan Kami</h4>
                    <ul>
                        <li><a href="#">Kegiatan Belajar Mengajar</a></li>
                        <li><a href="#">Bimbingan Konseling</a></li>
                        <li><a href="#">Ekstrakurikuler</a></li>
                        <li><a href="#">Prestasi Siswa</a></li>
                        <li><a href="#">Program Beasiswa</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>Jl. Raya Pendidikan No. 1</p>
                    <p>Bukittinggi, Sumatera Barat</p>
                    <p>Indonesia</p>
                    <p class="mt-4"><strong>Telepon:</strong> <span>+62 1234 5678</span></p>
                    <p><strong>Email:</strong> <span>info@sman1bukittinggi.sch.id</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">SMAN 1 Bukittinggi</strong> <span>Seluruh Hak
                    Dilindungi</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>

</html>
