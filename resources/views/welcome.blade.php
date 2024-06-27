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

        .active-link {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!--NAVBAR-->
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-200 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!--BODY-->
    <div class="p-4">
        <div id="about-section" class="p-4 flex items-center justify-center h-auto mb-4 rounded bg-gray-100 dark:bg-gray-800 border-gray-800">
            <div class="p-4">
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Manajemen</span> Ruangan dan Kegiatan</h1>
                <p class="mb-4 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 hidden md:block">
                    Media Penjadwalan dan Manajemen Ruangan Dinas Komunikasi dan Informatika (DINKOMINFO) Kabupaten
                    Banyumas.
                </p>
                <div class="flex">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-gradient-to-r to-emerald-600 from-sky-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">More
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="text-4xl text-center font-bold dark:text-white mb-4">Ruangan</h2>
        <div id="ruangan-section" class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div class="flex items-center justify-center">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="asset/ruang.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ruang 1</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
              <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <a href="#">
                      <img class="rounded-t-lg" src="asset/ruang.jpg" alt="" />
                  </a>
                  <div class="p-5">
                      <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ruang 2</h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                      <a href="#"
                          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Read more
                          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                          </svg>
                      </a>
                  </div>
              </div>
            </div>
            <div class="flex items-center justify-center">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="asset/ruang.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ruang 3</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            </div>
            <div class="flex items-center justify-center">
          <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                  <img class="rounded-t-lg" src="asset/ruang.jpg" alt="" />
              </a>
              <div class="p-5">
                  <a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ruang 4</h5>
                  </a>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  <a href="#"
                      class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      Read more
                      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                      </svg>
                  </a>
              </div>
          </div>
            </div>
        </div>
        <h2 class="text-4xl text-center font-bold dark:text-white mb-4">Jadwal Kegiatan</h2>
        <div id ="jadwal-section"n class="flex items-center justify-center mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Kegiatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Departemen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ruang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Mulai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Selesai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Durasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penanggung Jawab
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rapat Bulanan
                            </th>
                            <td class="px-6 py-4">
                                Departemen 1
                            </td>
                            <td class="px-6 py-4">
                                Ruang A
                            </td>
                            <td class="px-6 py-4">
                                10-12-2023
                            </td>
                            <td class="px-6 py-4">
                                08.00
                            </td>
                            <td class="px-6 py-4">
                                10.00
                            </td>
                            <td class="px-6 py-4">
                                02.00
                            </td>
                            <td class="px-6 py-4">
                                Kusmala Rosinta
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rapat Bulanan
                            </th>
                            <td class="px-6 py-4">
                                Departemen 1
                            </td>
                            <td class="px-6 py-4">
                                Ruang A
                            </td>
                            <td class="px-6 py-4">
                                10-12-2023
                            </td>
                            <td class="px-6 py-4">
                                08.00
                            </td>
                            <td class="px-6 py-4">
                                10.00
                            </td>
                            <td class="px-6 py-4">
                                02.00
                            </td>
                            <td class="px-6 py-4">
                                Kusmala Rosinta
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rapat Bulanan
                            </th>
                            <td class="px-6 py-4">
                                Departemen 1
                            </td>
                            <td class="px-6 py-4">
                                Ruang A
                            </td>
                            <td class="px-6 py-4">
                                10-12-2023
                            </td>
                            <td class="px-6 py-4">
                                08.00
                            </td>
                            <td class="px-6 py-4">
                                10.00
                            </td>
                            <td class="px-6 py-4">
                                02.00
                            </td>
                            <td class="px-6 py-4">
                                Kusmala Rosinta
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rapat Bulanan
                            </th>
                            <td class="px-6 py-4">
                                Departemen 1
                            </td>
                            <td class="px-6 py-4">
                                Ruang A
                            </td>
                            <td class="px-6 py-4">
                                10-12-2023
                            </td>
                            <td class="px-6 py-4">
                                08.00
                            </td>
                            <td class="px-6 py-4">
                                10.00
                            </td>
                            <td class="px-6 py-4">
                                02.00
                            </td>
                            <td class="px-6 py-4">
                                Kusmala Rosinta
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                    href="https://flowbite.com/" class="hover:underline">DINKOMINFO</a>. All Rights Reserved.
            </span>
            <div id="datetime" class="text-sm text-gray-500 sm:text-center dark:text-gray-400 mt-3 md:mt-0"></div>
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
    <!-- Flowbite JavaScript for mobile menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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
</body>

</html>
