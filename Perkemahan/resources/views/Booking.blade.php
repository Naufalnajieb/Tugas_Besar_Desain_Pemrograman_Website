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
            <h1 class="display-4 text-white animated slideInDown mb-4">Booking Barang/Peralatan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/list_Booking') }}">Rental/Persewaan</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/list_Booking') }}">List Booking</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Booking Barang/Peralatan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Appointment Start -->
    <style>
        mark { 
          background-color: yellow;
          color: black;
        }
        input:disabled, button:disabled, textarea:disabled {
            cursor: not-allowed;
        }
    </style>
    @foreach($Barang as $listBarang)
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-body text-uppercase mb-2">Booking</h6>
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h1 class="display-6 mb-0">{{$listBarang->nama}}</h1>
                    </div>
                    <!-- Team Start -->
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid" src="/Kemah/img/Barang/{{$listBarang->foto}}" alt="">
                        </div>
                    </div>
                    <div class="wow fadeInUp" style="margin-top: 15px; display:flex;" data-wow-delay="0.1s">
                        <h6 class="text-uppercase"><b>Kategori</b></h6>
                        <h6 class="text-uppercase" style="margin-left: 12px">: {{$listBarang->kategori}}</h6>
                    </div>
                    <div class="wow fadeInUp" style="margin-top: 15px; display:flex;" data-wow-delay="0.1s">
                        <h6 class="text-uppercase"><b>Stok</b></h6>
                        <h6 class="text-uppercase" style="margin-left: 50px">: {{$listBarang->stok}}</h6>
                    </div>
                    <div class="wow fadeInUp" style="margin-top: 15px; display:flex;" data-wow-delay="0.1s">
                        <h6 class="text-uppercase"><b>Harga</b></h6>
                        <h6 class="text-uppercase" style="margin-left: 35px">: Rp {{number_format($listBarang->harga, 0, ',', '.')}}</h6>
                    </div>
                    <div class="wow fadeInUp" style="margin-top: 15px; display:flex;" data-wow-delay="0.1s">
                        <h6 class="text-uppercase"><b>Status</b></h6>
                        <h6 class="text-uppercase" style="margin-left: 30px">: <mark>{{$listBarang->status}}</mark></h6>
                    </div>
                    <p class="mb-0" style="margin-top: 20px;">
                        {{$listBarang->deskripsi}}
                    </p>
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">

                    <form action="{{route ('procces')}}" method="POST" id="payment-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <h6 class="mb-2">Nama</h6>
                                <div class="form-floating" style="color: darkslategray;">
                                    <input type="text" class="form-control bg-warning border-0" id="nama" name="nama" placeholder="Gurdian Name" disabled>
                                    <label for="gname">{{$user->name}}</label>
                                </div>
                            </div>
                            <style>
                                .akak{
                                    background-color: darkslategray;
                                }
                            </style>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Email</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="email" class="form-control bg-warning border-0" id="email" name="email" placeholder="Gurdian Email" disabled>
                                    <label for="gmail">{{$user->email}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Kontak</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="text" class="form-control bg-warning border-0" id="kontak" name="kontak" placeholder="Child Name" disabled>
                                    <label for="cname">{{$user->contact}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Tanggal Mulai Booking (Bulan, Tanggal, Tahun)</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="date" class="form-control bg-light border-0" id="mulai" name="mulai" placeholder="Child Age" value="dd-mm-yyyy" required>
                                    <label for="cage"></label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Durasi Waktu Booking (Bulan, Tanggal, Tahun)</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="date" class="form-control bg-light border-0" id="akhir" name="akhir" placeholder="Child Age" value="dd-mm-yyyy" required>
                                    <label for="cage"></label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Jumlah Produk Yang Digunakan: </h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="number" class="form-control bg-light border-0" id="quantity" name="quantity" placeholder="Child Age" required>
                                    <label for="cage"></label>
                                </div>
                            </div>
                                <input type="hidden" id="id_barang" name="id_barang" value="{{ $listBarang->id_barang }}">
                                <input type="hidden" id="nama_barang" name="nama_barang" value="{{ $listBarang->nama }}">
                                <input type="hidden" id="price" name="price" value="{{$listBarang->harga }}">
                            <div class="col-12" style="direction: flex;">
                                <button class="btn btn-primary py-3" type="submit" value="bayar" style="width: 90%">(+) Booking dan Bayar</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Appointment End -->


   @include('scriptkemping')
   <script>
    $(function(){
        //Bagian menghitung tanngal Mulai Booking
        var date_today = new Date();
        var month = date_today.getMonth() + 1;
        var day = date_today.getDate();
        var year = date_today.getFullYear();

        //Bagian Jika bulan dan waktu kurang dari 10 hari tambahkan 0
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        //Tanngal Akhir untuk kedua value tanggal
        var maxDate = year + '-' + month + '-' + day;
        $('#mulai').attr('min', maxDate);
        $('#akhir').attr('min', maxDate);

        //----------Set max date for #awal and #akhir to be 31 days from today
        var maxEndDate = new Date(date_today);
        maxEndDate.setDate(maxEndDate.getDate() + 31);

        var endMonth = maxEndDate.getMonth() + 1;
        var endDay = maxEndDate.getDate();
        var endYear = maxEndDate.getFullYear();

        if (endMonth < 10)
            endMonth = '0' + endMonth.toString();
        if (endDay < 10)
            endDay = '0' + endDay.toString();

        var maxEndDateString = endYear + '-' + endMonth + '-' + endDay;
        $('#mulai').attr('max', maxEndDateString);
        $('#akhir').attr('max', maxEndDateString);
        
        // Event listener to update #akhir min value based on #mulai value
        $('#mulai').on('change', function(){
            var startDate = new Date($(this).val());
            var minEndDate = new Date(startDate);
            minEndDate.setDate(minEndDate.getDate() + 1); // Add one day

            var minEndMonth = minEndDate.getMonth() + 1;
            var minEndDay = minEndDate.getDate();
            var minEndYear = minEndDate.getFullYear();

            if (minEndMonth < 10)
                minEndMonth = '0' + minEndMonth.toString();

            if (minEndDay < 10)
                minEndDay = '0' + minEndDay.toString();

            var minEndDateString = minEndYear + '-' + minEndMonth + '-' + minEndDay;
            $('#akhir').attr('min', minEndDateString);
        });

        //----------Set max date for #akhir to be 31 days from min value
        var newMaxEndDate = new Date(startDate);
        newMaxEndDate.setDate(newMaxEndDate.getDate() + 31);

        var newEndMonth = newMaxEndDate.getMonth() + 1;
        var newEndDay = newMaxEndDate.getDate();
        var newEndYear = newMaxEndDate.getFullYear();

        if (newEndMonth < 10)
            newEndMonth = '0' + newEndMonth.toString();
        if (newEndDay < 10)
            newEndDay = '0' + newEndDay.toString();

        var newMaxEndDateString = newEndYear + '-' + newEndMonth + '-' + newEndDay;
        $('#akhir').attr('max', newMaxEndDateString);
    });
    </script>
   
</body>

</html>
</x-app-layout>