<!DOCTYPE html>
<html lang="en">

@include('headkemping')

<style>
    .popup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.4rem;
        width: 450px;
        padding: 1.3rem;
        min-height: 250px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 15px;
        z-index: 1050; /* Ensure it's above other elements */
    }

    .popup .arah {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        position: relative;
    }

    .popup input {
        padding: 0.7rem 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.9em;
    }

    .popup p {
        font-size: 0.9rem;
        color: #777;
        margin: 0.4rem 0 0.2rem;
    }

    button {
        cursor: pointer;
        border: none;
        font-weight: 600;
    }

    .tombol {
        display: inline-block;
        padding: 0.5rem 0.5rem;
        font-weight: 300;
        background-color: rgb(255, 145, 0);
        color: white;
        border-radius: 5px;
        text-align: right;
        float: right;
        font-size: 1em;
    }

    .tombol-buka {
        position: relative;
    }

    .tombol-tutup {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 30px;
        height: 30px;
        background-color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 5px rgba(0,0,0,0.3);
    }

    .tombol-tutup::before {
        content: '×';
        font-size: 20px;
        color: black;
    }

    .layoutatas {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
        z-index: 1040; /* Ensure it's below the modal but above other elements */
    }

    .sembunyi {
        display: none;
    }

    .damage-list {
        list-style-type: none;
        padding: 0;
        margin: 0.5rem 0;
    }

    .damage-list li {
        display: grid;
        grid-template-columns: 1fr auto auto;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #ddd;
    }

    .damage-list li:last-child {
        border-bottom: none;
    }

    .damage-list span {
        text-align: left;
    }

    .damage-list input[type="radio"] {
        margin-left: 20px;
    }
</style>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <x-app-layout>

    <!-- Obat Section -->
    <main id="main" style="padding-top: 70px;">
    
    <!-- ======= Rekam Medis Section ======= -->
    <section id="rekam_medis" class="services">
        <div class="container">
    
            <div class="section-title">
            <h2>Pengembalian dan bagian Penanganan Kerusakan</h2>
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
                    <?php
                        $index = 0;
                        foreach($transactions as $transaction){
                    ?>
                    <tr>
                        <th scope="row" style="color: black;"><?= $index = $index + 1?></th>
                        <td style="color: black;"><?= $transaction['nama'] ?></td>
                        <td style="color: black;"><?= date("d-m-Y", strtotime($transaction['tanggal_awal'])) ?></td>
                        <td style="color: black;"><?= date("d-m-Y", strtotime($transaction['tanggal_akhir'])) ?></td>
                        <td style="color: black;"><?= $transaction['jumlah_stok'] ?></td>
                        <td style="color: black;"><?= number_format($transaction['total_harga'], 0, ',', '.') ?></td>
                        <td style="color: black;"><?= date("d-m-Y H:i:s", strtotime($transaction['created_at'])) ?></td>
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
                            <button class="tombol tombol-buka">Pengembalian</button>
                            <section class="popup sembunyi">
                                <div class="arah">
                                    <button class="tombol-tutup"></button>
                                </div>
                                <div>
                                    <h3>Daftar Kerusakan Barang</h3>
                                    <p>Silahkan pilih kerusakan barang yang Anda alami:</p>
                                    <form action="{{route ('procces_denda')}}" method="POST">
                                        @csrf
                                        <ul class="damage-list">
                                            <li>
                                                <span>Robekan (Rusak ringan)</span>
                                                <span>Rp 50.000</span>
                                                <input type="radio" name="total" value="50000">
                                            </li>
                                            <li>
                                                <span>Malfungsi (Rusak Sedang)</span>
                                                <span>Rp 100.000</span>
                                                <input type="radio" name="total" value="100000">
                                            </li>
                                            <li>
                                                <span>Tidak Berfungsi (Rusak Berat)</span>
                                                <span>Rp 200.000</span>
                                                <input type="radio" name="total" value="200000">
                                            </li>
                                            <li>
                                                <span>Tidak Bisa Digunakan (Rusak Total)</span>
                                                <span>Rp 500.000</span>
                                                <input type="radio" name="total" value=" 500000">
                                            </li>

                                            <input type="hidden" name="id_transaction" value="{{ $transaction['id_transaction'] }}">
                                        </ul>
                                        <button type="submit" class="tombol" style="right: 20px;">Submit</button>
                                    </form>
                                </div>
                            </section>
                            <div class="layoutatas sembunyi"></div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    @if ($index < 1)
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada transaksi</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        </section><!-- Rekam Medis Section -->
    </main>

    <div class="container">
        <div class="row g-15">
            <div class="col-lg-15 wow fadeInUp" data-wow-delay="0.1s">
            <p class="mb-4 fa fa-bullhorn" style="font-size: 18px">
                Catatan : Jangan lupa untuk mengembalikan barang dan membayar denda apabila mengalami kerusakan
                Dengan mengunjungi langsung ke Toko Fakhri Camp dengan tenggat waktu booking 
                yang sudah dipilih, mulai dari pukul 09:00 - 18:00 WIB !!!
            </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modals = document.querySelectorAll('.popup');
            const overlays = document.querySelectorAll('.layoutatas');
            const openModalBtns = document.querySelectorAll('.tombol-buka');
            const closeModalBtns = document.querySelectorAll('.tombol-tutup');
            const damageForms = document.querySelectorAll("#damageForm");

            // close modal function
            const closeModal = function (modal, overlay) {
                modal.classList.add("sembunyi");
                overlay.classList.add("sembunyi");
            };

            // open modal function
            const openModal = function (modal, overlay) {
                modal.classList.remove("sembunyi");
                overlay.classList.remove("sembunyi");
            };

            openModalBtns.forEach((btn, index) => {
                const modal = modals[index];
                const overlay = overlays[index];
                const closeModalBtn = closeModalBtns[index];
                const damageForm = damageForms[index];

                btn.addEventListener("click", function () {
                    if (confirm("Apakah Anda Yakin untuk mengembalikan barang?")) {
                        if (confirm("Apakah barang yang Anda gunakan mengalami kerusakan?")) {
                            openModal(modal, overlay);
                        } else {
                            alert("Terima Kasih Telah Menggunakan Jasa Fakhri Camp, jangan lupa berikan rating!");
                        }
                    }
                });

                // close the modal when the close button and overlay is clicked
                closeModalBtn.addEventListener("click", () => closeModal(modal, overlay));
                overlay.addEventListener("click", () => closeModal(modal, overlay));

                // close modal when the Esc key is pressed
                document.addEventListener("keydown", function (e) {
                    if (e.key === "Escape" && !modal.classList.contains("sembunyi")) {
                        closeModal(modal, overlay);
                    }
                });
            });
        });
    </script>
        
 @include('scriptkemping')
    
</x-app-layout>
</body>
</html>
