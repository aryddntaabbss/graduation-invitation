@extends('layouts.main')

@section('body')
<div class="relative flex flex-col items-center justify-center text-center min-h-screen mx-4">
    <div class="text-gray-950 p-4 w-full max-w-md">

        <!-- Bagian Hitung Mundur -->
        <div class="my-4">
            <div>
                <a href="#">
                    <img src="{{ asset('images/TOPI-TOGA.png') }}" class="w-auto h-20 mx-auto text-gray-500" />
                </a>
            </div>
            <h2 id="countdown-title" class="text-xl sm:text-2xl md:text-4xl font-bold text-white font-alumni mb-2">
                Welcome To My Graduation Invitation
            </h2>
        </div>

        <!-- Bagian Tamu -->
        <div class="bg-white rounded-lg py-2 px-4">
            {{-- <h3 class="text-sm sm:text-md md:text-lg font-normal text-pink-950 font-alumni">
                Dear,</h3> --}}
            <h1 class="text-xl sm:text-2xl md:text-4xl font-bold text-pink-950 font-alumni">
                {{ $guest->name }}
            </h1>
        </div>

        <!-- Pesan -->
        <p class="text-white text-normal sm:text-md md:text-lg my-4 font-alumni italic">
            "Thank you for being part of my journey. Your presence means a lot to me on this special day."
        </p>

        <!-- Tombol -->
        <a href="{{ route('invitation', $guest->slug) }}"
            class="bg-white hover:bg-pink-900 text-pink-950 hover:text-white font-semibold px-6 py-3 my-4 rounded-lg shadow-lg transition">
            View Invitation
        </a>
    </div>
    @include('layouts.footer')
</div>

@endsection