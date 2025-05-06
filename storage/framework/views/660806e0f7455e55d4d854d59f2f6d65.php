<?php $__env->startSection('title'); ?> SMART LURAH <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.png" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Kelurahan <span>Batupoaro</span></h1>
          <p data-aos="fade-up" data-aos-delay="100 ">Sistem informasi yang dirancang untuk mempermudah <br> pengelolaan dan pelayanan di tingkat kelurahan.</p>
          <!-- <p data-aos="fade-up" data-aos-delay="100">Quickly start your project now and set the stage for success<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div> -->
          <img src="assets/img/hero-services-img.png" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Pengelolaan Data Penduduk</a></h4>
                <p class="description">Memudahkan pencatatan dan pengelolaan data penduduk secara digital.</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Layanan Pengaduan Masyarakat</a></h4>
                <p class="description">Fasilitas bagi masyarakat untuk menyampaikan pengaduan secara cepat dan efisien.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Informasi Layanan Publik</a></h4>
                <p class="description">Menyediakan informasi terkini mengenai layanan publik yang tersedia di kelurahan.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>
    <!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Tentang Kami</p>
            <h3>SMART LURAH bertujuan untuk meningkatkan kualitas pelayanan publik di tingkat kelurahan melalui teknologi informasi yang inovatif.</h3>
            <p class="fst-italic">
              Kami percaya bahwa dengan memanfaatkan teknologi, kami dapat memberikan layanan yang lebih baik dan lebih cepat kepada masyarakat. SMART LURAH hadir untuk menjawab tantangan dalam pengelolaan data dan pelayanan publik.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Meningkatkan transparansi dalam pengelolaan data.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Mempermudah akses informasi bagi masyarakat.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Mendorong partisipasi aktif masyarakat dalam pengelolaan kelurahan.</span></li>
            </ul>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fitur Unggulan SMART LURAH</h2>
        <p>SMART LURAH dilengkapi dengan berbagai fitur yang memudahkan pengelolaan dan pelayanan.</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-binoculars"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Pengelolaan Data Penduduk</h4>
                    <p>
                      Memudahkan dan mempercepat proses pencatatan serta pengelolaan data penduduk secara digital, memungkinkan akses informasi yang akurat dan terkini, sekaligus meningkatkan efisiensi administrasi kependudukan. 
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-box-seam"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Layanan Pengaduan Masyarakat</h4>
                    <p>
                      Fasilitas ini dirancang untuk memberikan saluran pengaduan yang cepat, efisien, dan mudah diakses bagi seluruh lapisan masyarakat secara langsung kepada pihak yang berwenang tanpa harus melalui proses birokrasi yang rumit dan memakan waktu.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-brightness-high"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Informasi Layanan Publik</h4>
                    <p>
                      Layanan Informasi Publik Kelurahan hadir untuk mempermudah akses warga terhadap berbagai layanan yang disediakan oleh pemerintah kelurahan. 
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->

          </div>

          <div class="col-lg-6">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="assets/img/tabs-1.png" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-2">
                <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-3">
                <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Features Details Section -->
    <section id="features-details" class="features-details section">

      <div class="container">

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/features-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Pengelolaan Data Penduduk</h3>
              <p>
                Dengan platform terpusat, data kependudukan dapat diakses, diperbarui, dan dianalisis dengan mudah, meminimalkan duplikasi dan inkonsistensi data. Sistem ini juga memungkinkan pelacakan perubahan data penduduk secara real-time, memberikan gambaran akurat dan terkini tentang demografi serta kebutuhan masyarakat.              </p>
              <a href="#" class="btn more-btn">Learn More</a>
            </div>
          </div>

        </div><!-- Features Item -->

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

            <div class="content">
              <h3>Layanan Pengaduan Masyarakat</h3>
              <p>
                Sistem ini memungkinkan warga masyarakat untuk mengajukan pengaduan secara online dan memantau status pengaduan mereka secara real-time. Hal ini memudahkan proses pengaduan dan meningkatkan transparansi pelayanan.
                
              </p>
              <ul>
                <li><i class="bi bi-easel flex-shrink-0"></i> Masyarakat dapat mengajukan pengaduan secara online.</li>
                <li><i class="bi bi-patch-check flex-shrink-0"></i> Status pengaduan dapat dipantau secara real-time.</li>
                <li><i class="bi bi-brightness-high flex-shrink-0"></i> Pengaduan dapat diarahkan ke unit kerja yang sesuai.</li>
              </ul>
              <p></p>
              <a href="#" class="btn more-btn">Learn More</a>
            </div>

          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
          </div>

        </div><!-- Features Item -->

      </div>

    </section><!-- /Features Details Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan SMART LURAH</h2>
        <p>SMART LURAH menawarkan berbagai layanan untuk mendukung pengelolaan kelurahan.</p>

      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-5">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <i class="bi bi-activity icon"></i>
              <div>
                <h3>Konsultasi Pengelolaan Data</h3>
                <p>Menyediakan bantuan dalam pengelolaan data penduduk dan layanan kelurahan secara efisien dan akurat untuk masyarakat.</p>
                <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <!-- <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <i class="bi bi-broadcast icon"></i>
              <div>
                <h3>Pelatihan Sistem SMART LURAH</h3>
                <p>Memberikan pelatihan kepada petugas kelurahan untuk penggunaan sistem SMART LURAH secara efektif.</p>
                <a href="#" class="read-more stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                
              </div>
            </div>
          </div><!-- End Service Item -->
          </div>End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <i class="bi bi-easel icon"></i>
              <div>
                <h3>Dukungan Teknis</h3>
                <p>Menawarkan dukungan teknis agar sistem SMART LURAH dapat beroperasi dengan lancar dan tanpa hambatan.</p>
                <a href="#" class="read-more stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                <p>Memberikan dukungan teknis untuk memastikan sistem berjalan dengan baik.</p>
                <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <i class="bi bi-calendar-check icon"></i>
              <div>
                <h3>Pengajuan Kegiatan</h3>
                <p>Mempermudah proses pengajuan kegiatan yang ingin dilaksanakan oleh masyarakat di lingkungan kelurahan.</p>
                  <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <i class="bi bi-file-earmark-text icon"></i>
              <div>
                <h3>Pengajuan Surat Keterangan</h3>
                <p>Memfasilitasi pengajuan surat keterangan yang diperlukan masyarakat dengan cara yang mudah dan cepat.</p>
                <a href="#" class="read-more stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
               
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <i class="bi bi-file-earmark-spreadsheet icon"></i>
              <div>
                <h3>Data Statistik</h3>
                <p>Menyediakan akses mudah untuk melihat data statistik yang relevan bagi masyarakat dan pemangku kepentingan.</p>
                <a href="#" class="read-more stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- More Features Section -->
    <section id="more-features" class="more-features section">

      <div class="container">

        <div class="row justify-content-around gy-4">

          <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h3>Manfaat Aplikasi SMART LURAH</h3>
            <p>Dengan menggunakan aplikasi SMART LURAH, Pemerintah Kelurahan dapat meningkatkan efisiensi dan efektivitas pelayanannya.</p>
            

            <div class="row">

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-easel flex-shrink-0"></i>
                <div>
                  <h4>Peningkatan Efisiensi</h4>
                  <p>Aplikasi SMART LURAH dapat membantu Pemerintah Kelurahan dalam mengelola data dan informasi sehingga dapat meningkatkan efisiensi pelayanannya.</p>
                  
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-patch-check flex-shrink-0"></i>
                <div>
                  <h4>Peningkatan Efektivitas</h4>
                  <p>Aplikasi SMART LURAH dapat membantu Pemerintah Kelurahan dalam membuat keputusan yang lebih baik dan cepat.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-brightness-high flex-shrink-0"></i>
                <div>
                  <h4>Peningkatan Kualitas Pelayanan</h4>
                  <p>Aplikasi SMART LURAH dapat membantu Pemerintah Kelurahan dalam meningkatkan kualitas pelayanannya dengan memberikan informasi yang akurat dan up-to-date.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-lg-6 icon-box d-flex">
                <i class="bi bi-brightness-high flex-shrink-0"></i>
                <div>
                  <h4>Peningkatan Kepuasan Warga</h4>
                  <p>Aplikasi SMART LURAH dapat membantu Pemerintah Kelurahan dalam meningkatkan kepuasan warga dengan memberikan pelayanan yang lebih baik dan cepat.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>

          </div>

          <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/features-3.jpg" alt="">
          </div>

        </div>

      </div>

    </section><!-- /More Features Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Bagaimana cara mengajukan kegiatan?</h3>
                <div class="faq-content">
                  <p>Untuk mengajukan kegiatan, silakan login terlebih dahulu ke dalam aplikasi SMART LURAH. Kemudian, klik menu "Pengajuan Kegiatan" dan isi form yang tersedia dengan lengkap dan benar.</p>
                  
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara mengajukan surat keterangan?</h3>
                <div class="faq-content">
                  <p>Untuk mengajukan surat keterangan, silakan login terlebih dahulu ke dalam aplikasi SMART LURAH. Kemudian, klik menu "Pengajuan Surat Keterangan" dan isi form yang tersedia dengan lengkap dan benar.</p>
                  
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara melihat data statistik?</h3>
                <div class="faq-content">
                  <p>Untuk melihat data statistik, silakan login terlebih dahulu ke dalam aplikasi SMART LURAH. Kemudian, klik menu "Data Statistik" dan pilih data yang ingin dilihat.</p>
                  
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara menghubungi admin?</h3>
                <div class="faq-content">
                  <p>Untuk menghubungi admin, silakan klik menu "Kontak" dan isi form yang tersedia dengan lengkap dan benar. Kami akan segera menghubungi Anda kembali.</p>
                 
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara mengubah password?</h3>
                <div class="faq-content">
                  <p>Untuk mengubah password, silakan klik menu "Profil" dan klik tombol "Ubah Password". Isi form yang tersedia dengan lengkap dan benar.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara menghubungi pihak Lurah?</h3>
                <div class="faq-content">
                  <p>Untuk menghubungi pihak Lurah, silakan klik menu "Kontak" dan pilih "Lurah" sebagai pilihan penerima.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Kami telah membantu banyak pemerintah desa dalam mengelola data dan informasi dengan lebih baik.</p>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Aplikasi SMART LURAH sangat membantu kami dalam mengelola data dan informasi. Kami dapat dengan mudah mengakses data yang dibutuhkan dan menggunakannya untuk meningkatkan kualitas pelayanan kami.
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saudara A, Kepala Desa di Kabupaten XX</h3>
                  <h4>Desa X</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Kami sangat terbantu dengan adanya aplikasi SMART LURAH. Kami dapat dengan mudah mengelola data dan informasi, dan menggunakannya untuk meningkatkan kualitas pelayanan kami.
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Saudara B, Sekretaris Desa di Kabupaten YY</h3>
                  <h4>Desa Y</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Aplikasi SMART LURAH sangat membantu kami dalam meningkatkan kualitas pelayanan kami. Kami dapat dengan mudah mengakses data yang dibutuhkan dan menggunakannya untuk meningkatkan kualitas pelayanan kami.
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Saudara C, Perangkat Desa di Kabupaten ZZ</h3>
                  <h4>Desa Z</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Kami sangat terbantu dengan adanya aplikasi SMART LURAH. Kami dapat dengan mudah mengelola data dan informasi, dan menggunakannya untuk meningkatkan kualitas pelayanan kami.
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Saudara D, Kepala Desa di Kabupaten XX</h3>
                  <h4>Desa X</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Aplikasi SMART LURAH sangat membantu kami dalam mengelola data dan informasi. Kami dapat dengan mudah mengakses data yang dibutuhkan dan menggunakannya untuk meningkatkan kualitas pelayanan kami.
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Saudara E, Sekretaris Desa di Kabupaten YY</h3>
                  <h4>Desa Y</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4023.437750423602!2d122.59254059999999!3d-5.4590005999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da47716942f9067%3A0xcdebe73257057c83!2sKANTOR%20KECAMATAN%20BATUPOARO!5e1!3m2!1sid!2sid!4v1745511347766!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/arifrizal/Desktop/bckup/website-kelurahan/resources/views/index.blade.php ENDPATH**/ ?>