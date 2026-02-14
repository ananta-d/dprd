<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Sistem Informasi Pengaduan Masyarakat">
        <meta name="author" content="">

        <title>Sistem Pengaduan Masyarakat</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

        <link href= "{{ asset('template-welcome/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('template-welcome/css/bootstrap-icons.css') }}" rel="stylesheet">

        <link href="{{ asset('template-welcome/css/templatemo-topic-listing.css') }}" rel="stylesheet">

    </head>

    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <i class="bi-back"></i>
                        <span>LAPOR!</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="{{ route('role') }}" class="navbar-icon bi-person"></a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Kategori</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Alur Laporan</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Tanya Jawab</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Kontak</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Halaman</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Daftar Laporan</a></li>

                                    <li><a class="dropdown-item" href="#">Formulir Kontak</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="{{ route('role') }}" class="navbar-icon bi-person"></a>
                        </div>
                    </div>
                </div>
            </nav>


            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Sampaikan. Pantau. Selesai.</h1>

                            <h6 class="text-center">Layanan Aspirasi dan Pengaduan Online Rakyat</h6>

                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">

                                    </span>

                                    <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Cari laporan berdasarkan nomor tiket atau NIK..." aria-label="Search">

                                    <button type="submit" class="form-control">Cek Status</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>


            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="#">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Layanan Publik</h5>

                                            <p class="mb-0">Adukan masalah terkait administrasi desa, pelayanan KTP, dan surat menyurat.</p>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">12</span>
                                    </div>

                                    <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Anggaran Desa</h5>

                                            <p class="text-white">Transparansi penggunaan dana desa dan laporan pembangunan infrastruktur secara terbuka untuk warga.</p>

                                            <a href="{{ route('masyarakat.index') }}" class="btn custom-btn mt-2 mt-lg-3">Buat Pengaduan</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">5</span>
                                    </div>

                                    <div class="social-share d-flex">
                                        <p class="text-white me-4">Bagikan:</p>

                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="explore-section section-padding" id="section_2">
                <div class="container">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Kategori Laporan</h2>
                        </div>

                </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Infrastruktur</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">Kesehatan</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Sosial</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane" type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Keamanan</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Jalan Rusak</h5>

                                                            <p class="mb-0">Laporan kerusakan jalan protokol desa.</p>
                                                        </div>

                                                        <span class="badge bg-design rounded-pill ms-auto">24</span>
                                                    </div>

                                                    <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Lampu Jalan</h5>

                                                                <p class="mb-0">Pengaduan penerangan jalan umum yang padam.</p>
                                                        </div>

                                                        <span class="badge bg-design rounded-pill ms-auto">15</span>
                                                    </div>

                                                    <img src="images/topics/undraw_Redesign_feedback_re_jvm0.png" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Irigasi</h5>

                                                                <p class="mb-0">Masalah pengairan lahan pertanian warga.</p>
                                                        </div>

                                                        <span class="badge bg-design rounded-pill ms-auto">10</span>
                                                    </div>

                                                    <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">Bagaimana Cara Melapor?</h2>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">Tulis Laporan</h4>

                                        <p class="text-white">Klik tombol Login/Masuk, lalu isi formulir laporan dengan jelas beserta bukti foto yang relevan.</p>

                                        <div class="icon-holder">
                                          <i class="bi-pencil"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Proses Verifikasi</h4>

                                        <p class="text-white">Admin akan memeriksa kebenaran laporan Anda dalam waktu maksimal 1x24 jam sebelum diteruskan ke instansi terkait.</p>

                                        <div class="icon-holder">
                                          <i class="bi-check2-circle"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Tindak Lanjut & Selesai</h4>

                                        <p class="text-white">Instansi terkait akan menanggapi laporan Anda di lapangan. Anda dapat memantau progresnya di halaman dashboard pribadi.</p>

                                        <div class="icon-holder">
                                          <i class="bi-hand-thumbs-up"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <script src="{{ asset('template-welcome/js/jquery.min.js') }}"></script>
        <script src="{{ asset('template-welcome/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template-welcome/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('template-welcome/js/click-scroll.js') }}"></script>
        <script src="{{ asset('template-welcome/js/custom.js') }}"></script>

    </body>
</html>
