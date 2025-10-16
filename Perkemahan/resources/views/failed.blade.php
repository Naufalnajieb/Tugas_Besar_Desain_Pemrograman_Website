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

    <div class="d-flex justify-content-center" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                <h1 class="text-danger">Pembayaran Gagal</h1>
                <p class="text-danger">Transaksi Gagal Dilakukan</p>
                <a href="{{ route('transactions') }}" class="btn btn-primary mt-3">Lihat Transaksi</a>
            </div>
        </div>
    </div>

    @include('scriptkemping')
    
    </x-app-layout>
</body>
</html>