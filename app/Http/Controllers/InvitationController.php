<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class InvitationController extends Controller
{

    public function welcome($slug)
    {
        $guest = Guest::where('slug', $slug)->firstOrFail();

        return view('welcome-invitation', compact('guest'));
    }

    public function index($slug)
    {
        // Ambil semua pesan tamu (untuk carousel)
        $guests = Guest::latest()->get();

        // Cari guest berdasarkan slug (misalnya slug dikirim lewat URL)
        $guest = Guest::where('slug', $slug)->first();

        return view('invitation', compact('guests', 'guest', 'slug'));
    }

    public function show($slug)
    {
        $guests = Guest::latest()->get();
        $guest = Guest::where('slug', $slug)->firstOrFail();

        return view('invitation', compact('guests', 'guest', 'slug'));
    }

    public function update(Request $request, $slug)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:500',
        ]);

        // Cari guest berdasarkan slug (bukan id!)
        $guest = Guest::where('slug', $slug)->firstOrFail();

        // Update data
        $guest->update([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('invitation', $slug)->with('success', 'Pesan berhasil diperbarui.');
    }
}
