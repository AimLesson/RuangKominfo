@php
    use Illuminate\Support\Str;
    $jadwal = \App\Models\event::get();
    $ruang = \App\Models\Room::get();
@endphp
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