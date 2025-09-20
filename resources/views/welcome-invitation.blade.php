@extends('layouts.main')

@section('body')
<div class="relative flex flex-col items-center justify-center text-center min-h-screen mx-4">
    <div class="text-gray-950 p-4 w-full max-w-md">
        
        <!-- Bagian Hitung Mundur -->
        <div id="countdown-wrapper" class="my-4">
            <div>
                <a href="#">
                    <img src="{{ asset('images/TOPI-TOGA.png') }}" class="w-auto h-20 mx-auto text-gray-500" />
                </a>
            </div>
            <h2 id="countdown-title" class="text-xl sm:text-2xl md:text-4xl font-bold text-pink-400 font-alumni mb-2">
                Hitung Mundur Pesta Wisuda
            </h2>
            <div id="countdown" class="flex justify-center gap-4 text-white text-xl sm:text-2xl font-bold">
                <div class="flex-1 bg-white/50 py-4 rounded-lg border border-pink-400 text-center text-pink-400 font-alumni">
                    <span id="days">0</span>
                    <span class="block text-sm uppercase">Hari</span>
                </div>
                <div class="flex-1 bg-white/50 py-4 rounded-lg border border-pink-400 text-center text-pink-400 font-alumni">
                    <span id="hours">0</span>
                    <span class="block text-sm uppercase">Jam</span>
                </div>
                <div class="flex-1 bg-white/50 py-4 rounded-lg border border-pink-400 text-center text-pink-400 font-alumni">
                    <span id="minutes">0</span>
                    <span class="block text-sm uppercase">Menit</span>
                </div>
                <div class="flex-1 bg-white/50 py-4 rounded-lg border border-pink-400 text-center text-pink-400 font-alumni">
                    <span id="seconds">0</span>
                    <span class="block text-sm uppercase">Detik</span>
                </div>
            </div>
            <p id="halo-message" class="hidden text-pink-400 text-3xl font-bold mt-6 animate-bounce opacity-0 transition-opacity duration-700">
               Hari yang Ditunggu Telah Tiba
            </p>
        </div>
        <!-- Akhir Bagian Hitung Mundur -->

        <!-- Bagian Tamu -->
        <div class="bg-white/50 rounded-lg border border-pink-400 py-2 px-4">
            <h3 class="text-sm sm:text-md md:text-lg font-normal text-pink-400 font-alumni">
                Kepada Yth.
            </h3>
            <h1 class="text-xl sm:text-2xl md:text-4xl font-bold text-pink-400 font-alumni">
                {{ $guest->name }}
            </h1>
        </div>

        <!-- Pesan -->
        <p class="text-white text-normal sm:text-md md:text-lg my-4 font-alumni">
            Terima kasih telah hadir di momen spesial ini. Silakan klik tombol di bawah untuk melihat undangan.
        </p>

        <!-- Tombol -->
        <a href="{{ route('invitation', $guest->slug) }}"
           class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition">
            Buka Undangan
        </a>
    </div>
    @include('layouts.footer')
</div>

<!-- Script Hitung Mundur -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tanggalWisuda = new Date("Sep 27, 2025 00:00:00").getTime();
        const tanggalHalo = new Date("Sep 25, 2025 00:00:00").getTime();

        const hariEl = document.getElementById("days");
        const jamEl = document.getElementById("hours");
        const menitEl = document.getElementById("minutes");
        const detikEl = document.getElementById("seconds");
        const haloMessage = document.getElementById("halo-message");
        const countdownBox = document.getElementById("countdown");
        const countdownTitle = document.getElementById("countdown-title");

        function updateCountdown() {
            const sekarang = new Date().getTime();

            // Jika sudah tanggal 25 Sept atau lebih, tampilkan "Halo"
            if (sekarang >= tanggalHalo && sekarang < tanggalWisuda) {
                haloMessage.classList.remove("hidden");
                setTimeout(() => {
                    haloMessage.classList.remove("opacity-0");
                }, 100); // biar animasi fade in jalan
                countdownBox.classList.add("hidden");
                countdownTitle.textContent = "Saatnya Dimulai!";
                return;
            }

            // Hitung selisih waktu
            const jarak = tanggalWisuda - sekarang;

            if (jarak < 0) {
                countdownBox.innerHTML = "<span class='text-3xl sm:text-4xl text-pink-400 font-alumni'>Hari Wisuda 🎓</span>";
                return;
            }

            const hari = Math.floor(jarak / (1000 * 60 * 60 * 24));
            const jam = Math.floor((jarak % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const menit = Math.floor((jarak % (1000 * 60 * 60)) / (1000 * 60));
            const detik = Math.floor((jarak % (1000 * 60)) / 1000);

            hariEl.textContent = hari;
            jamEl.textContent = jam;
            menitEl.textContent = menit;
            detikEl.textContent = detik;
        }

        updateCountdown(); // jalankan pertama kali
        setInterval(updateCountdown, 1000);
    });
</script>
@endsection
