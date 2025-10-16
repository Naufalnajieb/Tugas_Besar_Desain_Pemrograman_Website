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

    <!-- Page Header Start -->
    {{-- Kemah/img/slide-(2).jpeg --}}
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">List Booking</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/list_Booking') }}">Rental/Persewaan</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">List Booking</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-body text-uppercase mb-2">Sewa Produk - Produk Terbaik Kami</h6>
                </div>
            </div>
           
            <div class="row g-4 justify-content-center">
                <?php $indeks = 0?>
                @foreach ($Barang as $listBarang)
                <?php $indeks = $indeks + 1?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light overflow-hidden h-100">
                        <img class="img-fluid" src="Kemah/img/Barang/{{$listBarang->foto}}" alt="">
                        <div class="service-text position-relative text-center h-100 p-4">
                            <div class="wow" style="display:flex;" data-wow-delay="0.1s">
                                <h6 class="text-uppercase mb-2"><b>Kategori </b></h6>
                                <h6 class="text-uppercase mb-2" style="margin-left: 12px">: {{$listBarang->kategori}}</h6>
                            </div>
                            <div class="wow" style="display:flex;" data-wow-delay="0.1s">
                                <h6 class="text-uppercase mb-2"><b>Stok </b></h6>
                                <h6 class="mb-2" style="margin-left: 50px">: {{$listBarang->stok}}</h6>
                            </div>
                            <div class="wow" style="display:flex;" data-wow-delay="0.1s">
                                <h6 class="text-uppercase mb-2"><b>Harga </b></h6>
                                <h6 class="mb-2" style="margin-left: 35px">: Rp {{number_format($listBarang->harga, 0, ',', '.')}}</h6>
                            </div>
                            {{-- <h5 class="mb-3" style="text-align: left;">{{$listBarang->nama}}</h5>
                            <h5 class="mb-3" style="text-align: left;">Kategori {{$listBarang->kategori}}</h5> --}}
                            <p style="margin-top: 10px">{{$listBarang->deskripsi}}</p>
                            <div style="margin-top: 20px;">
                                <a class="small" href="{{url ('/Booking/'. $listBarang->id_barang)}}">LIHAT DETAIL BOOKING<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


   @include('scriptkemping')
   
</body>

</html>
</x-app-layout>