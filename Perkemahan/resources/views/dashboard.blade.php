<!DOCTYPE html>
<html lang="en">

@include('headkemping')

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <x-app-layout>

    {{-- <style>
        .coba{
            background-color: rgb(195, 161, 10);
        }
    </style> --}}

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
                                    <a href="{{route('list_Booking')}}" class="btn btn-primary py-3 px-5">Detail Informasi</a>
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
                                    <a href="{{route('list_Booking')}}" class="btn btn-primary py-3 px-5">Detail Informasi</a>
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
                                    <a href="{{route('RecordS')}}" class="btn btn-primary py-3 px-5">Detail Informasi</a>
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
                <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a class="btn btn-primary py-3 px-5" href="{{url('/list_Booking')}}">Sewa lainnya</a>
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
                            <a class="small" href="{{url('/Booking/' . $listBarang->id_barang)}}">LIHAT DETAIL<i class="fa fa-arrow-right ms-3"></i></a>
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
</x-app-layout>
