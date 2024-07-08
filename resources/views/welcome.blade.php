<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RuangKominfo</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Custom CSS for background image -->
    <style>
        body {
            background-image: url('asset/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }
    </style>
</head>

<body class="font-sans antialiased">
    @php
        use Illuminate\Support\Str;
        $jadwal = \App\Models\event::get();
        $ruang = \App\Models\Room::get();
    @endphp
    <!--NAVBAR-->
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-200 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="asset/logo.png" class="w-9 h-auto" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">RuangKominfo</span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="#jadwal-section"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Jadwal</a>
                    </li>
                    <li>
                        <a href="#ruangan-section"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Ruangan</a>
                    </li>
                    <li>
                        <a href="#about-section"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        @auth <a href="{{ route('dashboard') }}"
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Login
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--BODY-->
    <div class="p-4">
        @if ($jadwal->isEmpty() && $ruang->isEmpty())
            <div id="about-section" class="p-4 flex items-center justify-center h-auto mb-4">
                <div class="p-4">
                    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Manajemen</span>
                        Ruangan dan Kegiatan</h1>
                    <p class="mb-4 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 hidden md:block">
                        Media Penjadwalan dan Manajemen Ruangan Dinas Komunikasi dan Informatika (DINKOMINFO) Kabupaten
                        Banyumas.
                    </p>
                </div>
            </div>
        @else
            <div id="about-section" class="p-4 flex items-center justify-center h-auto mb-4">
                <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($ruang as $index =>$r)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $r->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $r->nama_ruang }}">
                                @if ($index === 0)
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <h2 class="text-4xl font-bold text-white">Welcome</h2>
                                </div>
                            @endif
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                        @foreach ($ruang as $index => $r)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            <div id ="jadwal-section">
                <h1 class="text-xl text-center font-bold dark:text-white mb-4 md:text-5xl lg:text-2xl">Jadwal Kegiatan
                    Terkini</h1>
                @if ($jadwal->isEmpty())
                    <div class="flex items-center justify-center mb-4">
                        <div
                            class="text-center bg-white border border-gray-200 rounded-lg shadow p-5 dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tidak ada
                                Jadwal Tersedia</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tidak ada Jadwal untuk
                                ditampilkan. Silahkan cek kembali nanti.</p>
                        </div>
                    </div>
                @else
                <div id="jadwal-section" class="p-4">
                    <div class="flex items-center justify-center mb-4">
                        <form id="filter-form" class="space-y-4">
                            <div class="flex flex-col md:flex-row md:space-x-4">
                                <div>
                                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room</label>
                                    <select id="room" name="room" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Select Room</option>
                                        @foreach ($ruang as $r)
                                            <option value="{{ $r->nama_ruang }}">{{ $r->nama_ruang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="button" onclick="filterJadwal()" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center justify-center mb-4">
                        <div class="relative max-h-96 overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg" style="max-height: 500px;">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="jadwal-table">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No</th>
                                        <th scope="col" class="px-6 py-3">Nama Kegiatan</th>
                                        <th scope="col" class="px-6 py-3">Departemen</th>
                                        <th scope="col" class="px-6 py-3">Ruang</th>
                                        <th scope="col" class="px-6 py-3">Tanggal</th>
                                        <th scope="col" class="px-6 py-3">Waktu Mulai</th>
                                        <th scope="col" class="px-6 py-3">Waktu Selesai</th>
                                        <th scope="col" class="px-6 py-3">Durasi</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tbody id="jadwal-body">
                                    <!-- Dynamic rows will be added here based on filter -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div id="ruangan-section">
                <h2 class="text-xl text-center font-bold dark:text-white mb-4 md:text-5xl lg:text-2xl">Ruangan</h2>
                @if ($ruang->isEmpty())
                    <div class="flex items-center justify-center mb-4">
                        <div
                            class="text-center bg-white border border-gray-200 rounded-lg shadow p-5 dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tidak ada
                                Ruang Tersedia</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tidak ada Ruang untuk
                                ditampilkan. Silahkan cek kembali nanti.</p>
                        </div>
                    </div>
                @else
                    <div class="relative max-h-96 overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg"
                        style="max-height: 900px;">
                        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 m-4">
                            @foreach ($ruang as $r)
                                <div class="flex items-center justify-center">
                                    <div
                                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="#">
                                            <img class="rounded-t-lg" src="{{ asset('storage/' . $r->image) }}"
                                                alt="{{ $r->nama_ruang }}">
                                        </a>
                                        <div class="p-5">
                                            <a href="#">
                                                <h5
                                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $r->nama_ruang }}</h5>
                                            </a>
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                {{ Str::words($r->deskripsi, 10, '...') }}
                                            </p>
                                            <a href="{{ route('outside.show', $r->id) }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Read more
                                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                @endif
            </div>
    </div>
    </div>
    @endif
    </div>
    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                    href="https://flowbite.com/" class="hover:underli   ne">RuangKominfo</a>. All Rights Reserved.
            </span>
            <div id="datetime"
                class="text-sm text-gray-500 sm:text-center dark:text-gray-400 mt-3 md:mt-0 hidden md:block"></div>
        </div>
    </footer>

    <!-- Custom JavaScript for DatetimeFooter -->
    <script>
        function updateClock() {
            const now = new Date();

            // Format the date
            const year = now.getFullYear();
            const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
            const day = now.getDate().toString().padStart(2, '0');
            const dateString = `${year}-${month}-${day}`;

            // Format the time
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;

            // Combine date and time
            const dateTimeString = `${dateString} ${timeString}`;

            document.getElementById('datetime').textContent = dateTimeString;
        }

        // Initial call to display the date and time immediately
        updateClock();

        // Update the date and time every second
        setInterval(updateClock, 1000);
    </script>
    <!-- Custom JavaScript for Scrollspy -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('nav a');

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= sectionTop - sectionHeight / 3) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(a => {
                    a.classList.remove('active-link');
                    if (a.getAttribute('href').includes(current)) {
                        a.classList.add('active-link');
                    }
                });
            });
        });
    </script>
    <!-- Flowbite JavaScript for mobile menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
const jadwalData = @json($jadwal);

function filterJadwal() {
    console.log("Data before filtering:", jadwalData);
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    const room = document.getElementById('room').value;

    const filteredJadwal = jadwalData.filter(j => {
        const jadwalDate = new Date(j.date);
        const start = new Date(startDate);
        const end = new Date(endDate);

        return (!startDate || jadwalDate >= start) && (!endDate || jadwalDate <= end) && (!room || j.nama_rooms === room);
    });

    const jadwalBody = document.getElementById('jadwal-body');
    jadwalBody.innerHTML = '';

    if (filteredJadwal.length === 0) {
        const noDataRow = document.createElement('tr');
        noDataRow.innerHTML = `<td colspan="10" class="px-6 py-4 text-center">Tidak ada Jadwal untuk ditampilkan. Silahkan cek kembali nanti.</td>`;
        jadwalBody.appendChild(noDataRow);
        return;
    }

    let counter = 1;
    filteredJadwal.forEach(j => {
        const row = document.createElement('tr');
        row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
        
        const start = new Date(`1970-01-01T${j.start}:00`);
        const finish = new Date(`1970-01-01T${j.finish}:00`);
        const duration = new Date(finish - start).toISOString().substr(11, 5).replace(/^0(?:0:0?)?/, '');

        row.innerHTML = `
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${counter++}</th>
            <td class="px-6 py-4">${j.acara}</td>
            <td class="px-6 py-4">${j.asalbidang}</td>
            <td class="px-6 py-4">${j.nama_rooms}</td>
            <td class="px-6 py-4">${j.date}</td>
            <td class="px-6 py-4">${j.start}</td>
            <td class="px-6 py-4">${j.finish}</td>
            <td class="px-6 py-4">${duration} jam</td>
            <td class="px-6 py-4">${j.status}</td>
            <td class="px-6 py-4">${j.nama_penanggungjawab}</td>
        `;
        jadwalBody.appendChild(row);
    });
}

    </script>
</body>

</html>
