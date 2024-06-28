<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Room;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Event::all();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        $events = Event::all();
        $asalbidang = Event::select('asalbidang')->distinct()->get();
        return view('booking.create', compact('rooms','events','asalbidang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penanggungjawab' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'id_rooms' => 'required|exists:rooms,id',
            'nama_rooms' => 'required|string|max:255',
            'asalbidang' => 'required|in:Informasi dan Komunikasi Publik,Aplikasi Informatika,Statistik dan Persandian',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'finish' => 'required|date_format:H:i|after:start',
        ], [
            'start.required' => 'Kolom mulai wajib diisi.',
            'start.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.required' => 'Kolom selesai wajib diisi.',
            'finish.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.after' => 'Waktu selesai harus setelah waktu mulai.',
            'nama.required' => 'Kolom nama wajib diisi.',
            'acara.required' => 'Kolom acara wajib diisi.',
            'id_rooms.required' => 'Kolom ID ruangan wajib diisi.',
            'id_rooms.exists' => 'Ruangan yang dipilih tidak valid.',
            'nama_rooms.required' => 'Kolom nama ruangan wajib diisi.',
            'asalbidang.required' => 'Kolom asal bidang wajib diisi.',
            'asalbidang.in' => 'Asal bidang tidak valid.',
            'date.required' => 'Kolom tanggal wajib diisi.',
            'date.date' => 'Format kolom tanggal tidak valid.',
        ]);

        if (!Event::isRoomAvailable($request->id_rooms, $request->start, $request->finish, $request->date)) {
            return back()->withErrors(['msg' => 'Ruangan tidak tersedia di jadwal yang ditentukan']);
        }

        Event::create($request->all());

        return redirect()->route('booking.create')->with('success', 'Ruang berhasil dibooking');
    }

    public function edit(Event $booking)
    {
        $rooms = Room::all();
        $events = Event::all();
        $asalbidang = Event::select('asalbidang')->distinct()->get();
        return view('booking.edit', compact('booking', 'rooms', 'events','asalbidang'));        
    }

    public function update(Request $request, Event $booking)
    {
        $request->validate([
            'nama_penanggungjawab' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'id_rooms' => 'required|exists:rooms,id',
            'nama_rooms' => 'required|string|max:255',
            'asalbidang' => 'required|in:Informasi dan Komunikasi Publik,Aplikasi Informatika,Statistik dan Persandian',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'finish' => 'required|date_format:H:i|after:start',
        ], [
            'start.required' => 'Kolom mulai wajib diisi.',
            'start.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.required' => 'Kolom selesai wajib diisi.',
            'finish.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.after' => 'Waktu selesai harus setelah waktu mulai.',
            'nama.required' => 'Kolom nama wajib diisi.',
            'acara.required' => 'Kolom acara wajib diisi.',
            'id_rooms.required' => 'Kolom ID ruangan wajib diisi.',
            'id_rooms.exists' => 'Ruangan yang dipilih tidak valid.',
            'nama_rooms.required' => 'Kolom nama ruangan wajib diisi.',
            'asalbidang.required' => 'Kolom asal bidang wajib diisi.',
            'asalbidang.in' => 'Asal bidang tidak valid.',
            'date.required' => 'Kolom tanggal wajib diisi.',
            'date.date' => 'Format kolom tanggal tidak valid.',
        ]);

        if (!Event::isRoomAvailable($request->id_rooms, $request->start, $request->finish, $request->date)) {
            return back()->withErrors(['msg' => 'Ruangan tidak tersedia di jadwal yang ditentukan']);
        }

        $booking->update($request->all());

        return redirect()->route('booking.index')->with('success', 'Jadwal Berhasil Diperbarui');
    }

    public function updateStatus(Request $request, Event $booking)
    {
        $request->validate([
            'status' => 'required|string|in:Disetujui,Tidak Disetujui',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Status Berhasil Diupdate']);
    }

    public function destroy(Event $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Jadwal Berhasil Dihapus');
    }

    public function indexroom()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function createroom()
    {
        $rooms = Room::all();
        $status = Room::select('status')->distinct()->get();
        return view('rooms.create', compact('rooms','status'));
    }

    public function storeroom(Request $requestroom)
    {
        $requestroom->validate([
            'nama_ruang' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
        ], [
            'nama_ruang.required' => 'Kolom nama wajib diisi.',
            'image.required' => 'Kolom gambar wajib diisi.',
            'deskripsi.required' => 'Kolom deskripsi ruangan wajib diisi.',
            'status.required' => 'Kolom Status ruangan wajib diisi.',
        ]);

        $imagePath = $requestroom->file('image')->store('ruang', 'public');


        Room::create([
            'nama_ruang' => $requestroom->nama_ruang,
            'image' => $imagePath,
            'deskripsi' => $requestroom->deskripsi,
            'status' => $requestroom->status,
        ]);

        return redirect()->route('rooms.create')->with('success', 'Ruang berhasil ditambahkan');
    }

    public function show(Room $room)
    {
        $room->truncated_description=Str::words($room->deskripsi, 10, '...');
        return view('rooms.show', compact('room'));
    }

    public function showoutside($id)
    {
        $room = Room::findOrFail($id);
        return view('outside.show', compact('room'));
    }

    public function createoutside(Request $request)
    {
        $rooms = Room::all();
        $events = Event::all();
        $asalbidang = Event::select('asalbidang')->distinct()->get();
        $room_id = $request->query('room_id');
        
        return view('outside.create', compact('rooms', 'events', 'asalbidang', 'room_id'));
    }
    public function storeoutside(Request $request)
    {
        $request->validate([
            'nama_penanggungjawab' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'id_rooms' => 'required|exists:rooms,id',
            'nama_rooms' => 'required|string|max:255',
            'asalbidang' => 'required|in:Informasi dan Komunikasi Publik,Aplikasi Informatika,Statistik dan Persandian',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'finish' => 'required|date_format:H:i|after:start',
        ], [
            'start.required' => 'Kolom mulai wajib diisi.',
            'start.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.required' => 'Kolom selesai wajib diisi.',
            'finish.date_format' => 'Format kolom waktu tidak sesuai.',
            'finish.after' => 'Waktu selesai harus setelah waktu mulai.',
            'nama.required' => 'Kolom nama wajib diisi.',
            'acara.required' => 'Kolom acara wajib diisi.',
            'id_rooms.required' => 'Kolom ID ruangan wajib diisi.',
            'id_rooms.exists' => 'Ruangan yang dipilih tidak valid.',
            'nama_rooms.required' => 'Kolom nama ruangan wajib diisi.',
            'asalbidang.required' => 'Kolom asal bidang wajib diisi.',
            'asalbidang.in' => 'Asal bidang tidak valid.',
            'date.required' => 'Kolom tanggal wajib diisi.',
            'date.date' => 'Format kolom tanggal tidak valid.',
        ]);

        if (!Event::isRoomAvailable($request->id_rooms, $request->start, $request->finish, $request->date)) {
            return back()->withErrors(['msg' => 'Ruangan tidak tersedia di jadwal yang ditentukan']);
        }

        Event::create($request->all());

        return redirect()->route('outside.create')->with('success', 'Ruang berhasil dibooking');
    }
}
