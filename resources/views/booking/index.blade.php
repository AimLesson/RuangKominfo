<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Kegiatan') }}
        </h2>
    </x-slot>

    <div class="p-12">
        @foreach ($bookings->groupBy('nama_rooms') as $room => $roomBookings)
            <div class="p-4 m-4 border relative max-h-96 overflow-x-auto overflow-y-scroll shadow-md sm:rounded-lg" style="max-height: 500px;">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ $room }}</h3>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 p-4 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acara
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Penanggung Jawab
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Asal Bidang
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Waktu Mulai
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Waktu Selesai
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Durasi
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($roomBookings->sortBy('date') as $booking)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->acara }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->nama_penanggungjawab }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->asalbidang }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->start }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    {{ $booking->finish }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    @php
                                        $start = new DateTime($booking->start);
                                        $finish = new DateTime($booking->finish);
                                        $interval = $start->diff($finish);
                                        $hours = $interval->h;
                                        $minutes = $interval->i;
                                        $duration = $hours . ' jam ' . $minutes . ' menit';
                                    @endphp
                                    {{ $duration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                    <select name="status" data-id="{{ $booking->id }}" class="status-dropdown">
                                        <option value="Disetujui" {{ $booking->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                        <option value="Tidak Disetujui" {{ $booking->status == 'Tidak Disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('booking.edit', $booking) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('booking.destroy', $booking) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="9" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('booking.create') }}" class="text-green-600 hover:text-green-900">Tambah Jadwal</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        $(document).ready(function() {
            $('.status-dropdown').change(function() {
                var status = $(this).val();
                var bookingId = $(this).data('id');
                $.ajax({
                    url: '/booking/update-status/' + bookingId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error('Error updating status');
                    }
                });
            });
        });
    </script>
</x-app-layout>
