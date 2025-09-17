@extends('layouts.main')

@section('body')

<div class="relative min-h-screen flex flex-col items-center justify-between text-center">

    <!-- Row 1: Hero Carousel -->
    <div id="animation-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-72 w-screen overflow-hidden rounded-lg">
            @for($i = 1; $i <= 5; $i++) <div class="hidden duration-700 ease-in-out"
                data-carousel-item="{{ $i === 1 ? 'active' : '' }}">
                <img src="{{ asset('images/'.$i.'.png') }}" class="block w-full h-full object-contain mx-auto"
                    alt="Hero {{ $i }}">
        </div>
        @endfor
    </div>

    <!-- Row 2: Header -->
    <div class="w-full mt-4">
        <h2 class="text-lg sm:text-xl md:text-2xl tracking-wide font-alumni">
            We invite you to celebrate our graduation
        </h2>
    </div>

    <!-- Row 3: Konten Nama, Tanggal, Alamat, Tombol -->
    <div class="w-full">

        <!-- Nama & Keterangan -->
        <div class="text-center mb-4">
            <p class="text-4xl sm:text-5xl md:text-5xl font-mea-culpa mb-1 text-pink-400">
                Umairoh Salsabila Ibrahim S.S
            </p>

            <p class="text-normal sm:text-md md:text-lg -mt-2 font-alumni">
                Class Of 2025 - English Literature Khairun University
            </p>
        </div>

        <!-- Tanggal -->
        <div class="flex justify-center gap-4 items-center text-center mb-2 font-alumni">
            <div class="flex-1 text-right text-white font-semibold text-lg sm:text-xl md:text-2xl">
                Saturday
            </div>
            <div class="flex-1 bg-white/50 py-4 rounded-lg text-center text-pink-400">
                <div class="text-5xl sm:text-6xl md:text-7xl font-semibold">27</div>
                <div class="text-lg sm:text-xl md:text-2xl font-semibold">September</div>
            </div>
            <div class="flex-1 text-left text-white font-semibold text-lg sm:text-xl md:text-2xl">
                11:00 PM
            </div>
        </div>

        <!-- Alamat -->
        <a href="https://maps.app.goo.gl/oGUmtZt3HwWyXwEu9" target="_blank"
            class="text-normal sm:text-md md:text-lg leading-relaxed font-alumni mx-2 hover:text-pink-400">
            Hotel Bukit Pelangi Ternate, Jalan Jati Perumnas No.338, Kec. Ternate Sel., Kota Ternate, Maluku Utara
        </a>

        <!-- Map Embed -->
        <div class="mx-4">
            <!-- Container iframe responsif -->
            <div class="mx-auto w-full max-w-md rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.4562248845773!2d127.36827717496493!3d0.7719263992205737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x329cb41014dfe6f7%3A0xa05e6f67c14778ef!2sHotel%20Bukit%20Pelangi%20Ternate!5e0!3m2!1sid!2sid!4v1757830014414!5m2!1sid!2sid"
                    class="w-full h-64 sm:h-80 border-0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Guest Messages Carousel -->
        <div class="w-screen px-4 mt-6">
            <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory pb-4">
                @foreach(\App\Models\Guest::latest()->get() as $guest)
                <div
                    class="min-w-[250px] bg-white/50 backdrop-blur-md border rounded-xl shadow-md p-4 text-center snap-start">
                    <p class="text-normal sm:text-md md:text-lg font-semibold text-pink-400 font-alumni">
                        {{ $guest->name }}
                    </p>
                    <p class="italic text-pink-400 font-alumni">
                        "{{ $guest->message }}"
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol buka modal -->
        <button id="openGuestModal"
            class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg shadow transition">
            Leave a Message
        </button>

        <!-- Modal -->
        <div id="guestModal"
            class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-white/50 backdrop-blur-sm">
            <div class="relative bg-white rounded-lg shadow w-11/12 max-w-2xl">

                <!-- Header -->
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-pink-400">
                        Leave a Message
                    </h3>
                    <button id="closeGuestModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                        ✖
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">

                    <!-- Form Input Pesan -->
                    <form action="{{ route('guest.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Nama Anda" required
                                class="w-full px-3 py-2 mt-1 border text-gray-800 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500  ">
                        </div>

                        <div>
                            <input name="message" placeholder="Pesan Anda" rows="3" required
                                class="w-full px-3 py-2 mt-1 border text-gray-800 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500 "></input>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button id="closeGuestModalFooter"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-4 py-2 rounded-lg transition">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg shadow transition">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
</div>

@endsection