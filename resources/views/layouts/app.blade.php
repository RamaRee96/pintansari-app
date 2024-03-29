<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Klinik Pintan Sari</title>
    <meta name="author" content="Rama Reiswa">
    <meta name="description" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #ff3dc5;
        }

        .cta-btn {
            color: #ff3dc5;
        }

        .upgrade-btn {
            background: #c91b95;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #c91b95;
        }

        .nav-item:hover {
            background: #c91b95;
        }

        .account-link:hover {
            background: #ff3dc5;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <nav class="text-white text-base font-semibold pt-3">
            @if (Auth::user()->role === 'admin')
            <div class="p-6">
                <a href="/" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Klinik Pintan Sari -
                    Admin</a>
            </div>
            <a href="/" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/admin/resepsionis"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-notes-medical mr-3"></i>
                Resepsionis
            </a>
            <a href="/admin/dokter"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-stethoscope mr-3"></i>
                Dokter
            </a>
            <a href="/admin/apoteker"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user-nurse mr-3"></i>
                Apoteker
            </a>
            @elseif (Auth::user()->role === 'resepsionis')
            <div class="p-6">
                <a href="/" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Klinik Pintan Sari -
                    Resepsionis</a>
                <a href="/patients/create">
                    <button
                        class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-plus mr-3"></i>Pasien Baru</a>
                </button>
                <a href="/resepsionis/rekam-medis/create">
                    <button
                        class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300">
                        <i class="fas fa-plus mr-3"></i>Rekam Medis </a>
                </button>
                </a>
            </div>
            <a href="/" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/resepsionis/dataPasien" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-user-alt mr-3"></i>
                Data Pasien Terdaftar
            </a>
            <a href="/resepsionis/rekam-medis" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-notes-medical mr-3"></i>
                Daftar Rekam Medis
            </a>
            @elseif (Auth::user()->role === 'dokter')
            <div class="p-6">
                <a href="/" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Klinik Pintan Sari -
                    Dokter</a>
            </div>
            <a href="/" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/dokter/rekam-medis" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-notes-medical mr-3"></i>
                Data Rekam Medis Pasien
            </a>
            @elseif (Auth::user()->role === 'apoteker')
            <div class="p-6">
                <a href="/" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Klinik Pintan Sari -
                    Apoteker</a>
            </div>
            <a href="/" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/apoteker/dataObat" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-pills mr-3"></i>
                Data Obat
            </a>
            <a href="/apoteker/pasien-sudah-diperiksa" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-medkit mr-3"></i>
                Data Pasien Selesai Periksa
            </a>
            @endif
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('/images/pintansari.png') }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16" style="z-index: 99">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="block px-4 py-2 account-link hover:text-white" type="submit">Sign Out</button>
                    </form>

                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Klinik
                    Pintan Sari - Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="/" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="/resepsionis"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Resepsionis
                </a>
                <a href="/dokter" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Dokter
                </a>
                <a href="/apoteker"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Apoteker
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="/logout" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </header>

        @yield('content')

    </div>

    @livewireScripts
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>