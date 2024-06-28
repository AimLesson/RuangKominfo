<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\BookingController;

Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('booking.store');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::post('/booking/update-status/{booking}', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');

Route::get('/rooms', [BookingController::class, 'indexroom'])->name('rooms.index');
Route::get('/rooms/{room}', [BookingController::class, 'show'])->name('rooms.show');