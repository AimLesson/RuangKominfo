<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-sm rounded-lg">
                <img src='{{ asset('storage/'.$room->image) }}' alt="{{ $room->name }}" class="w-full h-64 object-cover rounded-lg">
                <div class="mt-6">
                    <h1 class="text-3xl font-semibold text-gray-800">{{ $room->nama_ruang }}</h1>
                    <p class="mt-4 text-gray-600">{{ $room->deskripsi }}</p>
                    <p class="mt-2 text-gray-600"><strong>Status:</strong> {{ $room->status }}</p>
                        <a href="{{ route('rooms.index') }}" class="ms-3 mt-6 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">                        
                            Kembali
                        </a>                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
