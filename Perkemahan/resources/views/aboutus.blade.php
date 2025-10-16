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
            <h1 class="display-4 text-white animated slideInDown mb-4">About US</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">
                        <a href="{{ url('/About_Us') }}">About US</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="Kemah/img/about.jpg" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h1 class="display-6 mb-0">Tentang kami</h1>
                    </div>
                    <p style="color: black;">Saya selaku Pemilik Website Mengucapkan Terima kasih yang sebesar--besarnya kepada para pengguna website
                       dan dosen pengampu Mata kuliah Design dan Pemrograman Saya. <br><br>
                       Tak lupa saya juga akan menyertakan kredit usaha saya selama belajar website ini. <br>
                       Special Thanks To : <br>
                       --HTML Codex (Website Tamplate) <br>
                       --FullStack overflow (Error handling) <br>
                       --Web Tech knowledge (youtube, bagian booking) <br>
                       --Web Programming UNPAS (youtube, bagian API Payment Gateaway Midtrans) <br>
                       --Muhammad Rafli (youtube, bagian API Payment Gateaway Midtrans) <br>
                       --freecodecamp.org (Bagian untuk Membuat modal dengan JavaScript) <br>
                       --ChatGpt (Error handling) <br>
                       --Pexels (Free Img) <br>
                       --jawatimuroutdoor.com <br>
                    </p>
                    <div class="border-top mt-4 pt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

</x-app-layout>

@include('scriptkemping')
</body>