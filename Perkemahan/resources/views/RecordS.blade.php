@include('headkemping')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <x-app-layout>
    
           {{-- Kemah/img/slide-(2).jpeg --}}
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Record Seluruh Transaksi di Fakhri Camp</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">
                        <a href="">Record Seluruh Transaksi di Fakhri Camp</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Obat Section -->
    <main id="main" style="padding-top: 30px;">
     <!-- ======= Rekam Medis Section ======= -->
     <section id="rekam_medis" class="services">
        <div class="container">
  
          <div class="section-title">
            <h2>Record Seluruh Transaksi di Fakhri Camp</h2>
            <a href="{{route('list_Booking')}}" class="btn btn-primary">(+) Transaksi</a>
          </div>
  
          <table class="table table-bordered table-striped table-hover">
              <thead class="table-dark">
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Foto</th>
                      <th scope="col">Nama Pelanggan</th>
                      <th scope="col">Email Pelanggan</th>
                      <th scope="col">Total Harga Bayar</th>
                      <th scope="col">Waktu Transaksi</th>
                  </tr>
              </thead>
              <tbody style="color: black;">
                  <tr>
                    <?php
                        $index = 0;
                        foreach($transactions as $transaction){
                    ?>
                        <th scope="row" style="color: black;"><?= $index = $index + 1?></th>
                        <td style="color: black;"><?= $transaction['nama'] ?></td>
                        <td style="color: black;">
                            <div class="gallery-item">
                                <a href="Kemah/img/Barang/{{$transaction->foto}}" class="galelry-lightbox">
                                    <img src="Kemah/img/Barang/{{$transaction->foto}}" alt="Obat" width="75px">
                                </a>
                            </div>
                        </td>
                        <td style="color: black;"><?= $transaction['name'] ?></td>
                        <td style="color: black;"><?= $transaction['email'] ?></td>
                        <td style="color: grey;"><?= number_format($transaction['total_harga'], 0, ',', '.') ?></td>
                        <td style="color: black;"><?= $convertdate = date("d-m-Y H:i:s", strtotime($transaction['created_at'])) ?></td>
                </tr>
                @if ($index < 1)
                <tr>
                    <td colspan="10" class="text-center">Tidak ada transaksi</td>
                </tr>
                @endif
                    <?php
                        }
                    ?>
              </tbody>
          </table>
  
        </div>
      </section><!-- Rekam Medis Section -->

    </main>

    </x-app-layout>

    @include('scriptkemping')
</body>