<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @include('headkemping')

        
    </head>
    <body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
        <style>
            .gaya{
                height: 20px;
                width: 20px;
                margin: 2px;
                font-size: 27px;
                background-color: lightgrey;
                border: 2px;
                border-color: black;
                display: inline;
                border-radius: 5px;
            }

            .gaya:hover{
                background-color: rgb(231, 169, 93);
                color: rgb(197, 197, 40);
            }
        </style>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center border-end px-3">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>najiebnaufall@upi.edu</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center border-end px-3">
                    <small class="far fa-clock me-2"></small>
                    <small>Senin - Jumat : 09.00 WIB - 18.00 WIB</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-square border-end border-start" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square border-end" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square border-end" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Topbar End -->


    <!-- Navbar Start -->

    <nav class="navbar navbar-expand-lg bg navbar-light sticky-top px-4 px-lg-5 py-lg-0" style="background-color: rgb(195, 161, 10);">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0"><i class="fa fa-building me-3" style="color: rgb(5, 67, 91)"></i>Fakhri Camp</h1>
        </a>
        {{-- <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-3 py-lg-0">
                {{-- <a href="service.html" class="nav-item nav-link" style="color: rgb(54, 52, 52)">Layanan Kami</a> --}}
            </div>
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <div class="btn btn-warning">
                            <a href="{{ url('/dashboard') }}" class="font-semibold" style="color: black;">Dashboard</a>
                        </div>
                    @else
                        <div class="btn btn-warning"; margin-right: 8px;">
                            <a href="{{ route('login') }}" class="font-semibold" style="color: black;">Log in</a>
                        </div>

                        @if (Route::has('register'))
                            <div class="btn btn-warning">
                                <a href="{{ route('register') }}" class="ml-4 font-semibold" style="color: black;">Register</a>
                            </div>
                        @endif
                    @endauth
                </div>
                @endif
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="Kemah/img/slide-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10">
                                    <h5 class="text-light text-uppercase mb-3 animated slideInDown">Selamat Datang di Fakhri Camp</h5>
                                    <h1 class="display-2 text-light mb-3 animated slideInDown">Informasi Produk Barang dan Peralatan</h1>
                                    <ol class="breadcrumb mb-4 pb-2">
                                        <li class="breadcrumb-item fs-5 text-light">Mudah</li>
                                        <li class="breadcrumb-item fs-5 text-light">Aman</li>
                                        <li class="breadcrumb-item fs-5 text-light">Berkualitas</li>
                                    </ol>
                                    @auth
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk melihat detail Informasi</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="Kemah/img/slide-2.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10">
                                    <h5 class="text-light text-uppercase mb-3 animated slideInDown">Selamat Datang di Fakhri Camp</h5>
                                    <h1 class="display-2 text-light mb-3 animated slideInDown">Sewa Produk Alat dan Barang</h1>
                                    <ol class="breadcrumb mb-4 pb-2">
                                        <li class="breadcrumb-item fs-5 text-light">Mudah</li>
                                        <li class="breadcrumb-item fs-5 text-light">Aman</li>
                                        <li class="breadcrumb-item fs-5 text-light">Berkualitas</li>
                                    </ol>
                                    @auth
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk melihat detail Informasi</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="Kemah/img/slide-3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10">
                                    <h5 class="text-light text-uppercase mb-3 animated slideInDown">Selamat Datang di Fakhri Camp</h5>
                                    <h1 class="display-2 text-light mb-3 animated slideInDown">Record Data Transaksi</h1>
                                    <ol class="breadcrumb mb-4 pb-2">
                                        <li class="breadcrumb-item fs-5 text-light">Mudah</li>
                                        <li class="breadcrumb-item fs-5 text-light">Aman</li>
                                        <li class="breadcrumb-item fs-5 text-light">Berkualitas</li>
                                    </ol>
                                    @auth
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk melihat detail Informasi</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    {{--/*---------------QRIS-------------------*/--}}
    {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Fakhri Halo" alt=""> --}}

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-body text-uppercase mb-2">Sewa Produk - Produk Terbaik Kami</h6>
                    <div class="border-start border-5 border-primary ps-4">
                        <h1 class="display-6 mb-0">Produk Kami dengan Kualitas Terbaik</h1>
                    </div>
                </div>
            </div>
           
            <div class="row g-4 justify-content-center">
                <?php $indeks = 0; ?>
                @foreach ($Barang as $listBarang)
                <?php $indeks = $indeks + 1; ?>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light overflow-hidden h-100">
                        <img class="img-fluid" src="Kemah/img/Barang/{{$listBarang->foto}}" alt="">
                        <div class="service-text position-relative text-center h-100 p-4">
                            <h5 class="mb-3">{{$listBarang->nama}}</h5>
                            <h5 class="mb-3">Kategori {{$listBarang->kategori}}</h5>
                            <p>{{$listBarang->deskripsi}}</p>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-body text-uppercase mb-2">Testimonial</h6>
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h1 class="display-6 mb-0">Apa Tanggapan Mereka Mengenai Produk kami!</h1>
                    </div>
                    <p class="mb-4">
                        Testimoni page merupakan sarana untuk meningkatkan kepercayaan pelanggan dengan 
                        menyajikan bukti nyata ulasan dan tanggapan dari pengalaman positif pengguna sebelumnya.
                    </p>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach($sql as $ulasan)
                        <div class="testimonial-item">
                            {{-- <img class="img-fluid mb-4" src="Kemah/img/testimonial-1.jpg" alt=""> --}}
                            <h5>{{$ulasan->name}}</h5>
                            <span>{{$ulasan->email}}</span>
                            <div class="bg-primary mb-3" style="width: 100px; height: 5px; margin-top: 10px"></div>
                            <p class="fs-5" style="margin-top: 20px;">
                                Nama Produk : {{$ulasan->nama}} <br><br>
                                {{$ulasan->deskripsi}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

            @include('scriptkemping')
    </body>
</html>
