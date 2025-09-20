@php
// $guest mungkin null jika buka halaman utama
$hasGuest = isset($guest) && $guest !== null;
@endphp

@extends('layouts.main')

@section('body')

<div class="relative min-h-screen flex flex-col items-center justify-between text-center">

    <!-- Row 1: Header -->
    <div class="w-full">
        <h2 class="text-2xl sm:text-3xl md:text-4xl uppercase tracking-wide font-anton">
            We Invited You To
        </h2>
    </div>

    <!-- Row 2: Gambar Hero -->
    <div class="flex justify-center flex-1 items-center">
        <img src="{{ asset('images/heroku.png') }}" alt="Hero Logo" class="w-auto object-contain">
    </div>

    <!-- Row 3: Konten Nama, Tanggal, Alamat, Tombol -->
    <div class="w-full">
        <!-- Nama & Keterangan -->
        <div class="text-center m-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl uppercase tracking-wide font-anton">
                Honor Of
            </h2>
            <p class="text-3xl sm:text-4xl md:text-4xl font-dancing font-semibold mb-1">
                M. Fikri Ramadhani S.Kom
            </p>

            <p class="text-xs sm:text-sm md:text-base uppercase text-gray-200">
                CLASS OF 2025 - INFORMATICS UNKHAIR TERNATE
            </p>
        </div>

        <!-- Tanggal -->
        <div class="flex justify-center gap-4 items-center text-center mb-2">
            <div class="flex-1 text-right text-white font-bold text-base sm:text-lg md:text-xl">
                Saturday
            </div>
            <div class="flex-1 text-center text-white">
                <div class="text-6xl sm:text-6xl md:text-7xl font-bold">27</div>
                <div class="text-base sm:text-lg md:text-xl">September</div>
            </div>
            <div class="flex-1 text-left text-white font-bold text-base sm:text-lg md:text-xl">
                11 PM
            </div>
        </div>

        <!-- Alamat -->
        <a class="text-xs sm:text-sm md:text-base text-gray-200">
            Jl. Bola Belakang RS. Islam Kel. Toboleu <br>(Samping Genk’s Gor Bulutangkis)
        </a>

        <!-- Map Embed -->
        <div class="mt-3 text-center">
            <a href="https://www.google.com/maps?q=0.809333,127.382834" target="_blank"
                class="inline-block bg-white  text-pink-950 font-bold py-2 px-6 rounded-lg shadow-lg transition transform hover:scale-105 text-sm sm:text-base">
                <i class="fa-solid fa-map-location-dot"></i> Maps
            </a>
        </div>

        <!-- Guest Messages Carousel -->
        <div class="w-screen px-4 mt-6">
            <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory pb-4">
                @foreach($guests as $g)
                @if(!empty($g->message))
                <div class="min-w-[250px] bg-white rounded-xl shadow-md p-2 text-center snap-start">
                    <p class="text-normal sm:text-md md:text-lg font-semibold text-pink-950">
                        {{ $g->name }}
                    </p>
                    <p class="italic text-pink-950">
                        "{{ $g->message }}"
                    </p>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Tombol Leave a Message: tampil hanya untuk guest saat ini yang belum isi pesan -->
        @if(isset($guest) && trim((string)$guest->message) === '')
        <button id="openGuestModal"
            class="inline-block bg-white  text-pink-950 font-bold py-2 px-6 rounded-lg shadow-lg transition transform hover:scale-105 text-sm sm:text-base">
            <i class="fa-solid fa-envelope"></i> Leave a Message </button>
        @endif

        <!-- Modal -->
        <div id="guestModal"
            class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-white/30 backdrop-blur-sm">
            <div class="relative bg-white rounded-lg shadow w-11/12 max-w-2xl">

                <!-- Header -->
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-pink-950">
                        Leave a Message
                    </h3>
                    <button id="closeGuestModal"
                        class="text-pink-950 bg-transparent hover:bg-gray-200 hover:text-pink-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">

                    <!-- Form Input Pesan -->
                    <form action="{{ route('guest.update', $guest->slug) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT') {{-- ini penting untuk Laravel update --}}

                        <div>
                            <input type="text" name="name" placeholder="Nama Anda" required
                                value="{{ $guest->name ?? '' }}"
                                class="w-full px-3 py-2 mt-1 border text-gray-800 rounded-lg shadow-sm focus:ring-pink-900 focus:border-pink-900">
                        </div>

                        <div>
                            <textarea name="message" placeholder="Pesan Anda" rows="3" required
                                class="w-full px-3 py-2 mt-1 border text-gray-800 rounded-lg shadow-sm focus:ring-pink-900 focus:border-pink-900">{{ $guest->message ?? '' }}</textarea>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button id="closeGuestModalFooter"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-4 py-2 rounded-lg transition">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-pink-950 hover:bg-pink-900 text-white px-4 py-2 rounded-lg shadow transition">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Musik Latar -->
        <audio id="background-music" loop>
            <source src="{{ asset('audio/backsound.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <!-- Tombol Kontrol Musik -->
        <button id="music-control"
            class="fixed bottom-6 right-6 bg-pink-900 text-white p-3 rounded-full shadow-lg hover:bg-pink-950 transition">
            <svg id="music-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z" />
            </svg>
        </button>
        @include('layouts.footer')
    </div>
    <!-- Script untuk modal -->
    <script>
        const modal = document.getElementById('guestModal');
            const openBtn = document.getElementById('openGuestModal');
            const closeBtn = document.getElementById('closeGuestModal');
            const closeBtnFooter = document.getElementById('closeGuestModalFooter');
            
            openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            });
            
            closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            });
            
            closeBtnFooter.addEventListener('click', () => {
            modal.classList.add('hidden');
            });
            
            // Klik luar modal untuk tutup
            window.addEventListener('click', (e) => {
            if (e.target === modal) {
            modal.classList.add('hidden');
            }
            });
    </script>
</div>

@endsection