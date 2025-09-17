<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('admin.guests.index', compact('guests'));
    }

    public function create()
    {
        return view('admin.guests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'nullable|string|max:500',
        ]);

        Guest::create($request->only('name', 'message'));
        return redirect()->route('admin.guests.index')->with('success', 'Guest berhasil ditambahkan.');
    }

    public function edit(Guest $guest)
    {
        return view('admin.guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'nullable|string|max:500',
        ]);

        $guest->update($request->only('name', 'message'));
        return redirect()->route('admin.guests.index')->with('success', 'Guest berhasil diperbarui.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('admin.guests.index')->with('success', 'Guest berhasil dihapus.');
    }
}
