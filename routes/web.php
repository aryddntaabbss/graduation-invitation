<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Guest;
use Illuminate\Support\Str;

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

    $guest = Guest::create([
        'name' => $request->name,
        'message' => $request->message,
        'slug' => Str::slug($request->name) . '-' . uniqid(),
    ]);

    return redirect()->route('invitation', $guest->slug);
})->name('guest.store');


Route::get('/invitation/{slug}', function ($slug) {
    $page = PageSetting::first();
    $guest = Guest::where('slug', $slug)->firstOrFail();
    $guestName = $guest->name;

    return view('invitation', compact('page', 'guestName'));
})->name('invitation');
