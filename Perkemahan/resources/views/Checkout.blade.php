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

    @foreach ($sql as $items)
        
    @csrf
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembokingan produk <strong>{{ $items->nama }}</strong> dengan harga
                <strong>Rp{{ number_format($items->total_harga, 0, ',', '.') }}</strong>
                <button type="button" class="btn btn-primary mt-3" id="bayar">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>

    @endforeach
    
    
    <script src= "{{ url('https://app.sandbox.midtrans.com/snap/snap.js'); }}"  data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
         document.getElementById('bayar').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{$sql->snap_token}}', {
          // Optional
          onSuccess: function(result){
            window.location.href = "{{ url('/Checkout/success/' . $sql->id_transaction) }}";
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            window.location.href = "{{ url('/Checkout/failed/' . $sql->id_transaction) }}";
          }
        });
      };
    </script>
     @include('scriptkemping')
</body>

</html>
</x-app-layout>