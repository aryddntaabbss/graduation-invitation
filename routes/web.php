<?php

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
