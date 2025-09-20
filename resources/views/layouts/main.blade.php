<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ 'GRADUATION CELEBRATION - UMAIROH SALSABILA IBRAHIM S.S' }}</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mea+Culpa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">

        <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
        <meta property="og:title" content="GRADUATION CELEBRATION - UMAIROH SALSABILA IBRAHIM S.S">
        <meta property="og:description"
            content="Wisuda Universitas Khairun Periode 2025–2026 di Hotel Bukit Pelangi, Ternate.">
        <meta property="og:image" content="{{ asset('images/banner.png') }}">
        <meta property="og:url" content="https://umairohsalsabilaibrahim.tong-it.site">
        <meta property="og:type" content="website">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="GRADUATION CELEBRATION - UMAIROH SALSABILA IBRAHIM S.S">
        <meta name="twitter:description"
            content="Wisuda Universitas Khairun Periode 2025–2026 di Hotel Bukit Pelangi, Ternate.">
        <meta name="twitter:image" content="{{ asset('images/banner.png') }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/TOPI-TOGA.png') }}" type="image/png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
        <style>
            @keyframes marquee {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }

            .animate-marquee {
                display: inline-block;
                white-space: nowrap;
                animation: marquee 20s linear infinite;
            }

            body {
                font-family: "Alumni Sans Pinstripe", sans-serif;
            }

            .font-mea-culpa {
                font-family: "Mea Culpa", cursive;
            }

            .font-alumni {
                font-family: "Inter Tight", sans-serif;
            }
        </style>

        @vite('resources/css/app.css')
    </head>

    <body class="font-sans text-white relative min-h-screen overflow-x-hidden">

        <!-- Loader -->
        <div id="loading" class="fixed inset-0 bg-white/50 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="w-16 h-16 border-4 border-gray-300 border-t-pink-400 rounded-full animate-spin"></div>
        </div>

        <!-- Background & Konten Tengah -->
        <div class="relative min-h-screen flex items-center justify-center text-center">

            <img src="{{ asset('images/background.jpg')}}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/20"></div> <!-- overlay -->

            <!-- Page Content -->
            <main class="w-auto h-full z-10 py-4">
                @yield('body')
                
            </main>
        </div>
        <script>
            // Sembunyikan loader saat halaman sudah dimuat
window.addEventListener('load', function() {
    const loader = document.getElementById('loading');
    if (loader) loader.style.display = 'none';

    // coba play musik
    const audio = document.getElementById('background-music');
    audio.muted = false; 
    audio.play().then(() => {
        console.log("Musik autoplay berhasil diputar");
    }).catch((err) => {
        console.log("Autoplay dicegah browser:", err);
    });
});

// Kontrol Musik
const audio = document.getElementById('background-music');
const musicControl = document.getElementById('music-control');
const musicIcon = document.getElementById('music-icon');

let isPlaying = true;

musicControl.addEventListener('click', () => {
    if (isPlaying) {
        audio.pause();
        isPlaying = false;
        musicIcon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z" />`;
    } else {
        audio.muted = false;
        audio.play();
        isPlaying = true;
        musicIcon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />`;
    }
});

// Pause musik saat tab tidak aktif, play lagi saat kembali
document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        audio.pause();
        isPlaying = false;
        musicIcon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z" />`;
    } else {
        audio.play().catch(err => console.log("Autoplay dicegah:", err));
        isPlaying = true;
        musicIcon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />`;
    }
});

        </script>
    </body>

</html>