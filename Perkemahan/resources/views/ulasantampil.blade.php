@include('headkemping')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <x-app-layout>

        <!-- Page Header Start -->
    {{-- Kemah/img/slide-(2).jpeg --}}
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Ulasan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">
                        <a href="">Ulasan</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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

</x-app-layout>

@include('scriptkemping')
</body>