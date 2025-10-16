@include('headkemping')

{{-- class="bg-white border-b border-gray-100" --}}
<!-- Topbar Start -->
<div class="container-fluid bg-light p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center border-end px-3">
                <small class="far fa-envelope-open me-2"></small>
                <small>najiebnaufall@upi.edu</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center border-end px-3">
                <small class="far fa-clock me-2"></small>
                <small>Senin - Jumat : 09.00 WIB - 18.00 WIB</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn btn-square border-end border-start" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square border-end" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square border-end" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Topbar End -->


<!-- Navbar Start -->

{{-- navbar-expand-lg --}}
{{-- navbar-light --}}

<nav class="navbar navbar-expand-lg bg navbar-light sticky-top px-4 px-lg-5 py-lg-0" style="background-color: rgb(195, 161, 10);">
    <a href="{{ url('/dashboard') }}" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0"><i class="fa fa-building me-3" style="color: rgb(5, 67, 91)"></i>Fakhri Camp</h1>
    </a>
    {{-- <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
            <a href="{{ url('/dashboard') }}" class="nav-item nav-link active" style="color: rgb(54, 52, 52)">Home</a>
            <a href="{{ url('/About_Us') }}" class="nav-item nav-link" style="color: rgb(54, 52, 52)">Tentang Kami</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: rgb(54, 52, 52)">Rental/Persewaan</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ url('/list_Booking') }}" class="dropdown-item" style="color: rgb(54, 52, 52)">Booking Barang/Peralatan</a>
                    <a href="{{ url('/Record_Semua')}}" class="dropdown-item" style="color: rgb(54, 52, 52)">Record Daftar Transaksi</a>
                    <a href="{{ url('/Record_10')}}" class="dropdown-item" style="color: rgb(54, 52, 52)">Record Daftar 10 Transaksi</a>
                </div>
            </div>
            <a href="{{ url('/Ulasan_Page') }}" class="nav-item nav-link" style="color: rgb(54, 52, 52)">Ulasan</a>
            {{-- <a href="service.html" class="nav-item nav-link" style="color: rgb(54, 52, 52)">Layanan Kami</a> --}}
        </div>
        <div class="nav-item">
            <nav x-data="{ open: false }">
                <!-- Primary Navigation Menu -->
                {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> --}}
                    {{-- <div class="flex justify-between h-16"> --}}
                        {{-- <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}">
                                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                                </a>
                            </div>
            
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
                        </div> --}}
            
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
            
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <x-dropdown-link href="{{url('/dashboard')}}">
                                        {{ __('Informasi Profile') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{url('/Transaction')}}">
                                        {{ __('Transaksi Saya') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{url('/Pengembalian')}}">
                                        {{ __('Pengembalian') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{url('/Ulasan')}}">
                                        {{ __('Ulasan Saya') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Edit Profile') }}
                                    </x-dropdown-link>
            
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
            
                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>
            
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
            
                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</nav>



<!-- Navbar End -->

