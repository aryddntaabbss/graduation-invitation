@extends('layouts.main')

@php
$page = \App\Models\PageSetting::first();
@endphp

@section('body')

<div class="relative min-h-screen flex flex-col items-center justify-between text-center">


    <!-- Row 1: Header -->
    <div class="w-full mt-4">
        <h1 class="text-2xl sm:text-2xl md:text-3xl tracking-wide font-dancing">- Welcome, {{ $guestName }} -
        </h1>
        <h2 class="text-2xl sm:text-3xl md:text-4xl uppercase tracking-wide font-anton">
            {{ $page->header_text}}
        </h2>
    </div>

    <!-- Row 2: Gambar Hero -->
    <div class="flex justify-center flex-1 items-center my-4">
        @if($page && $page->hero_image)
        <img src="{{ asset('storage/'.$page->hero_image) }}" alt="Hero Logo" class="w-auto object-contain">
        @endif
    </div>

    <!-- Row 3: Konten Nama, Tanggal, Alamat, Tombol -->
    <div class="w-full mb-6">

        <!-- Nama & Keterangan -->
        <div class="text-center mb-4">
            <p class="text-2xl sm:text-3xl md:text-4xl uppercase tracking-wide font-anton">
                {{ $page->degree }}
            </p>
            <p class="text-3xl sm:text-4xl md:text-4xl font-dancing font-semibold mb-1">
                {{ $page->name }}
            </p>
            <p class="text-xs sm:text-sm md:text-base uppercase text-gray-200">
                {{ $page->class_info }}
            </p>
        </div>

        <!-- Tanggal -->
        <div class="flex justify-center gap-4 items-center text-center mb-2">
            <div class="flex-1 text-right text-gray-200 font-bold text-base sm:text-lg">
                {{ $page->day }}
            </div>
            <div class="flex-1 text-center text-white">
                <div class="text-5xl font-bold">{{ $page->date }}</div>
                <div class="text-base sm:text-lg">{{ $page->month }}</div>
            </div>
            <div class="flex-1 text-left text-gray-200 font-bold text-base sm:text-lg">
                {{ $page->time  }}
            </div>
        </div>

        <!-- Alamat -->
        <p class="text-xs sm:text-sm md:text-base leading-relaxed mt-2">
            {!! nl2br(e($page->address )) !!}
        </p>

        <!-- Tombol Google Maps -->
        @if($page && $page->maps_url)
        <div class="mt-2 text-center">
            <a href="{{ $page->maps_url }}" target="_blank"
                class="inline-block bg-pink-200 hover:bg-pink-300 text-pink-900 font-bold py-2 px-6 rounded-lg shadow-lg transition transform hover:scale-105 text-sm sm:text-base">
                📍 Lihat Lokasi
            </a>
        </div>
        @endif

        <!-- Tombol Musik -->
        <div id="music-control"
            class="fixed bottom-6 right-6 w-10 h-10 bg-pink-900 rounded-full flex items-center justify-center shadow-lg cursor-pointer hover:bg-pink-400 transition">
            <svg id="music-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z" />
            </svg>
        </div>

        <!-- Audio -->
        @if($page && $page->music_file)
        <audio id="background-music" autoplay loop>
            <source src="{{ asset('storage/'.$page->music_file) }}" type="audio/mpeg">
        </audio>
        @endif
    </div>
</div>

@endsection