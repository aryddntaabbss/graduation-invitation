<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('invitation');
})->name('invitation');

// Simpan pesan tamu langsung dari modal
Route::post('/guest', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100',
        'message' => 'required|string|max:500',
    ]);

    Guest::create([
        'name' => $request->name,
        'message' => $request->message,
        'slug' => Str::slug($request->name) . '-' . uniqid(),
    ]);

    return back()->with('success', 'Pesan berhasil dikirim!');
})->name('guest.store');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('guests', GuestController::class);
});

Route::get('/dashboard', function () {
    $guestCount = \App\Models\Guest::count();
    return view('dashboard', compact('guestCount'));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
