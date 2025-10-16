@include('headkemping')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <x-app-layout>

    <!-- Obat Section -->
    <main id="main" style="padding-top: 70px;">
     <!-- ======= Rekam Medis Section ======= -->
     <section id="rekam_medis" class="services">
        <div class="container">
  
          <div class="section-title">
            <h2>List Transaksi Saya</h2>
            <a href="{{route('list_Booking')}}" class="btn btn-primary">(+) Transaksi</a>
          </div>
  
          <table class="table table-bordered table-striped table-hover">
              <thead class="table-dark">
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Tanggal Awal</th>
                      <th scope="col">Tanggal Akhir</th>
                      <th scope="col">Jumlah Stok</th>
                      <th scope="col">Total Harga Bayar</th>
                      <th scope="col">Waktu Transaksi</th>
                      <th scope="col">Foto</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
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
                        <td style="color: black;"><?= date("d-m-Y", strtotime($transaction['tanggal_awal'])) ?></td>
                        <td style="color: black;"><?= date("d-m-Y", strtotime($transaction['tanggal_akhir'])) ?></td>
                        <td style="color: black;"><?= $transaction['jumlah_stok'] ?></td>
                        <td style="color: black;"><?= number_format($transaction['total_harga'], 0, ',', '.') ?></td>
                        <td style="color: black;"><?= $convertdate = date("d-m-Y H:i:s", strtotime($transaction['created_at'])) ?></td>
                        <td style="color: black;">
                            <div class="gallery-item">
                                <a href="Kemah/img/Barang/{{$transaction->foto}}" class="galelry-lightbox">
                                    <img src="Kemah/img/Barang/{{$transaction->foto}}" alt="Obat" width="75px">
                                </a>
                            </div>
                        </td>
                        <td>
                            @if ($transaction['status'] == 'pending')
                                <span class="badge bg-warning text-dark">{{ $transaction['status'] }}</span>
                            @elseif ($transaction['status'] == 'success')
                                <span class="badge bg-success">{{ $transaction['status'] }}</span>
                            @else
                                <span class="badge bg-danger">{{ $transaction['status'] }}</span>
                            @endif
                        </td>
                        
                        <td style="color: black;">
                            @if ($transaction['status'] == 'pending')
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="snap_token" value="{{ $transaction['snap_token']}}">
                                    <input type="hidden" name="id_transaction" value="{{ $transaction['id_transaction']}}">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </form>
                            @elseif ($transaction['status'] == 'success')
                                <a href="{{url('/Pengembalian')}}" class="btn btn-success">Pengembalian</a>
                            @endif
                        </td>
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
    <div class="container">
        <div class="row g-10">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
            <p class="mb-4 fa fa-bullhorn" style="font-size: 18px">
                Catatan : Silahkan kunjungi langsung ke Toko Fakhri Camp dengan tanggal waktu booking 
                yang sudah dipilih, mulai dari pukul 09:00 - 18:00 WIB
                apabila status pembayaran telah dinyatakan success !!!
            </p>
            </div>
        </div>
    </div>

    </x-app-layout>

    @include('scriptkemping')
</body>