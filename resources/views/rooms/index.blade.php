<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Ruangan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($rooms->isEmpty())
                <div class="flex items-center justify-center mb-4">
                    <div class="text-center bg-white border border-gray-200 rounded-lg shadow p-5 ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Tidak ada Ruang Tersedia</h5>
                        <p class="mb-3 font-normal text-gray-700 ">Tidak ada Ruang untuk ditampilkan. Silahkan Tambah
                            Data.</p>
                        <a href="{{ route('rooms.create') }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Tambah Ruang
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>
                        </a>
                    </div>
                </div>
            @else
                <div class="grid gap-6 mb-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($rooms as $room)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <a href="{{ route('rooms.show', $room) }}">
                                <img class="rounded-t-lg" src="{{ asset('storage/' . $room->image) }}"
                                    alt="{{ $room->name }}">
                            </a>
                            <div class="p-5">
                                <a href="{{ route('rooms.show', $room) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $room->nama_ruang }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $room->truncated_description }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700">{{ $room->status }}</p>
                                <a href="{{ route('rooms.show', $room) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Show Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
