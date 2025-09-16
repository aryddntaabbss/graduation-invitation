<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $appSetting->title ?? 'GRADUATION CELEBRATION - M. FIKRI RAMADHANI S.KOM' }}</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Anton&family=Arimo:ital,wght@0,400..700;1,400..700&display=swap"
            rel="stylesheet">

        <!-- SEO Meta Tags -->
        <meta property="og:title" content="{{ $appSetting->og_title }}">
        <meta property="og:description" content="{{ $appSetting->og_description }}">
        <meta property="og:image" content="{{ asset('storage/' . $appSetting->og_image) }}">
        <meta name="twitter:title" content="{{ $appSetting->twitter_title }}">
        <meta name="twitter:description" content="{{ $appSetting->twitter_description }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $appSetting->twitter_image) }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('storage/' . $appSetting->favicon) }}">

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
                font-family: 'Montserrat', sans-serif;
            }

            .font-dancing {
                font-family: 'Dancing Script', cursive;
            }

            .font-anton {
                font-family: "Anton", sans-serif;
            }
        </style>

        @vite('resources/css/app.css')
    </head>

    @php
    $page = \App\Models\PageSetting::first();
    @endphp

    <body class="font-sans text-white relative min-h-screen">

        <!-- Loader -->
        <div id="loading" class="fixed inset-0 bg-black flex items-center justify-center z-50">
            <div class="w-16 h-16 border-4 border-gray-300 border-t-blue-500 rounded-full animate-spin"></div>
        </div>

        <!-- Background & Konten Tengah -->
        <div class="relative min-h-screen flex items-center justify-center text-center">

            @if($page && $page->background)
            <img src="{{ asset('storage/'.$page->background) }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-black/30"></div> <!-- overlay -->

            <!-- Page Content -->
            <main class="w-auto bg-white">
                @yield('body')
            </main>

        </div>
        <script>
            // Sembunyikan loader saat halaman sudah dimuat
            window.addEventListener('load', function() {
                const loader = document.getElementById('loading');
        
                if (loader) {
                    loader.style.display = 'none'; // sembunyikan loader
                }
            });

            // Kontrol Musik
            const audio = document.getElementById('background-music');
            const musicControl = document.getElementById('music-control');
            const musicIcon = document.getElementById('music-icon');
            
            let isPlaying = false;
            
            musicControl.addEventListener('click', () => {
            if (!isPlaying) {
            audio.muted = false; 
            audio.play();
            isPlaying = true;
            musicIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />`;
            } else {
            audio.pause();
            isPlaying = false;
            musicIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z" />`;
            "play"
            }
            });
        </script>
    </body>

</html>