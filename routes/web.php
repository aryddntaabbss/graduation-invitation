<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Guest;

Route::get('/', function () {
    return redirect()->route('guest.form');
});

Route::get('/guest', function () {
    return view('guest');
})->name('guest.form');

Route::post('/guest', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100',
        'message' => 'nullable|string|max:500',
    ]);

    session(['guest_name' => $request->name]);

    Guest::create([
        'name' => $request->name,
        'message' => $request->message,
    ]);

    return redirect()->route('invitation');
})->name('guest.store');


Route::get('/invitation', function () {
    $page = \App\Models\PageSetting::first();
    $guest = \App\Models\Guest::latest()->first();
    $guestName = $guest ? $guest->name : 'Tamu Undangan';
    return view('invitation', compact('page', 'guestName'));
})->name('invitation');
