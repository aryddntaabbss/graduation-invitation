@extends('layouts.main')

@section('body')
<div class="relative flex-col  text-center flex items-center justify-center min-h-screen mx-4">
    <div class="bg-white text-gray-950 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Masukkan Nama Anda</h2>
        <form action="{{ route('guest.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Anda"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-950 focus:outline-none" required>
            <button type="submit"
                class="mt-4 w-full bg-pink-950 hover:bg-pink-900 text-white font-bold py-2 px-4 rounded-lg">
                Lanjut ke Undangan
            </button>
        </form>
    </div>
</div>
@endsection