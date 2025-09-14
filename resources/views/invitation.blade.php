<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graduation Invitation</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

        <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
        <meta property="og:title" content="Undangan Wisuda UNKHAIR - Umairoh Salsabila Ibrahim, S.S. 🎓">
        <meta property="og:description"
            content="Dengan hormat, kami mengundang Bapak/Ibu & Saudara/i untuk hadir dalam Wisuda Universitas Khairun Periode 2025–2026 di Hotel Bukit Pelangi, Ternate.">
        <meta property="og:image" content="{{ asset('TOPI-TOGA.png') }}">
        <meta property="og:url" content="https://domainanda.com/undangan-wisuda">
        <meta property="og:type" content="website">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Undangan Wisuda UNKHAIR - Umairoh Salsabila Ibrahim, S.S. 🎓">
        <meta name="twitter:description"
            content="Wisuda Universitas Khairun Periode 2025–2026 di Hotel Bukit Pelangi, Ternate.">
        <meta name="twitter:image" content="{{ asset('TOPI-TOGA.png') }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('TOPI-TOGA.png') }}" type="image/png">

        <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }

            .font-dancing {
                font-family: 'Dancing Script', cursive;
            }

            .font-rammetto-one {
                font-family: "Rammetto One", sans-serif;
            }
        </style>

        @vite('resources/css/app.css')
    </head>

    <body class="font-sans text-white relative min-h-screen">

        <div id="loading" class="fixed inset-0 bg-black flex items-center justify-center z-50">
            <div class="w-16 h-16 border-4 border-gray-300 border-t-blue-500 rounded-full animate-spin"></div>
        </div>

        <!-- Background & Konten Tengah -->
        <div class="relative min-h-screen flex items-center justify-center text-center">
            <img src="{{ asset('images/background.jpg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/30"></div> <!-- overlay -->

            <div class="relative min-h-screen flex flex-col items-center justify-between text-center">

                <!-- Row 1: Header -->
                <div class="w-full">
                    <h2
                        class="mt-4 text-xl sm:text-2xl md:text-3xl font-extrabold uppercase tracking-wide font-rammetto-one">
                        We invited you to
                    </h2>
                </div>

                <!-- Row 2: Gambar Heroku -->
                <div class="flex justify-center flex-1 items-center my-4">
                    <img src="{{ asset('images/heroku.png') }}" alt="Heroku Logo" class="w-auto object-contain">
                </div>

                <!-- Row 3: Konten Nama, Tanggal, Alamat, Tombol -->
                <div class="w-full mb-6">

                    <!-- Nama & Keterangan -->
                    <div class="text-center mb-4">
                        <p class="text-lg sm:text-xl md:text-2xl font-extrabold uppercase mb-1 font-rammetto-one">
                            IN HONOR OF
                        </p>
                        <p class="text-3xl sm:text-4xl md:text-4xl font-dancing font-semibold mb-1">
                            M. Fikri Ramadhani, S.Kom
                        </p>
                        <p class="text-xs sm:text-sm md:text-base uppercase text-gray-200">
                            CLASS OF 2025 - INFORMATICS UNKHAIR TERNATE
                        </p>
                    </div>

                    <!-- Tanggal -->
                    <div class="flex justify-center gap-4 items-center text-center mb-2">
                        <div class="flex-1 text-right text-gray-200 font-bold text-base sm:text-lg">Sabtu</div>
                        <div class="flex-1 text-center text-white">
                            <div class="text-5xl font-bold">27</div>
                            <div class="text-base sm:text-lg">September</div>
                        </div>
                        <div class="flex-1 text-left text-gray-200 font-bold text-base sm:text-lg">12 PM</div>
                    </div>

                    <!-- Alamat -->
                    <p class="text-xs sm:text-sm md:text-base leading-relaxed mt-2">
                        Jl. Bola Belakang RS. Islam Kel. Toboleu <br>
                        (Samping Genk’s Gor Bulutangkis)
                    </p>

                    <!-- Tombol Google Maps -->
                    <div class="mt-2 text-center">
                        <a href="https://www.google.com/maps?q=0.809333,127.382834" target="_blank"
                            class="inline-block bg-pink-200 hover:bg-pink-300 text-pink-900 font-bold py-2 px-6 rounded-lg shadow-lg transition transform hover:scale-105 text-sm sm:text-base">
                            📍 Lihat Lokasi
                        </a>
                    </div>

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
                    <audio id="background-music" loop>
                        <source src="{{ asset('audio/Rayakan-Pemenang.mp3') }}" type="audio/mpeg">
                    </audio>

                    <script>
                        const music = document.getElementById('background-music');
                        const control = document.getElementById('music-control');
                        const icon = document.getElementById('music-icon');
                    
                        // Mulai audio otomatis (beberapa browser butuh interaksi pengguna)
                        music.play().catch(() => {
                            console.log('Autoplay gagal, tunggu interaksi pengguna');
                        });
                    
                        control.addEventListener('click', () => {
                            if (music.paused) {
                                music.play();
                                // ubah icon ke pause
                                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6"/>`;
                            } else {
                                music.pause();
                                // ubah icon ke play
                                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.518-3.758A1 1 0 007 8.254v7.492a1 1 0 001.234.972l6.518-1.884a1 1 0 000-1.848z"/>`;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', function() {
                const loader = document.getElementById('loading');
                const app = document.getElementById('app');
        
                loader.style.display = 'none'; // sembunyikan loader
                app.classList.remove('hidden'); // tampilkan konten utama
            });
        </script>

    </body>

</html>