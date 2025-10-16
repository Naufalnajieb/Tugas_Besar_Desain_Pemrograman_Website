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
    @foreach($transactions as $listBarang)
    <div class="container-xxl py-5" style="margin-top: 100px;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-body text-uppercase mb-2">Ulasan Produk</h6>
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h1 class="display-6 mb-0">{{$listBarang->nama}}</h1>
                    </div>
                    <!-- Team Start -->
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid" src="/Kemah/img/Barang/{{$listBarang->foto}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">

                    <form action="{{route ('stored')}}" method="POST" id="payment-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <h6 class="mb-2">Nama</h6>
                                <div class="form-floating" style="color: darkslategray;">
                                    <input type="text" class="form-control bg-warning border-0" id="nama" name="nama" placeholder="Gurdian Name" disabled>
                                    <label for="gname">{{$user->name}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Email</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="email" class="form-control bg-warning border-0" id="email" name="email" placeholder="Gurdian Email" disabled>
                                    <label for="gmail">{{$user->email}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="mb-2">Deskripsi Ulasan</h6>
                                <div class="form-floating" style="color: darkslategray">
                                    <input type="textarea" class="form-control bg-light border-0" id="deskripsi" name="deskripsi" required>
                                    <label for="cage"></label>
                                </div>
                            </div>

                            <input type="hidden" name="id_transaction" value="{{$listBarang->id_transaction}}">
                            <div class="col-12" style="direction: flex;">
                                <button class="btn btn-primary py-3" type="submit" style="width: 90%">Submit</button>
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
   
</body>

</html>
</x-app-layout>