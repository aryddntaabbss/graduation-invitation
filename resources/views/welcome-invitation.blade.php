@extends('layouts.main')

@section('body')
<div class="relative flex-col  text-center flex items-center justify-center max-h-screen mx-4">
    <div class="bg-white/50 backdrop-blur-md text-gray-950 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-4 font-alumni">Halo, Selamat Datang</h3>
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-pink-400 mb-4 font-alumni">{{ $guest->name }}
        </h1>

        <p class="text-white mb-6 font-alumni text-lg sm:text-xl">
            Terima kasih sudah hadir di momen spesial ini. Silakan klik tombol di bawah untuk melihat undangan.
        </p>

        <a href="{{ route('invitation', $guest->slug) }}"
            class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition">
            Lihat Undangan
        </a>
    </div>
</div>
@endsection