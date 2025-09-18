<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Str;

Route::get('/welcome/{slug}', [InvitationController::class, 'welcome'])->name('invitation.welcome');
Route::get('/invitation/{slug}', [InvitationController::class, 'index'])->name('invitation');
Route::put('/invitation/{slug}', [InvitationController::class, 'update'])->name('guest.update');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('guests', GuestController::class);
});

Route::get('/dashboard', function () {
    $guestCount = Guest::count();
    return view('dashboard', compact('guestCount'));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
