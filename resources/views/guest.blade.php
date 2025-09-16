@extends('layouts.main')

@section('body')
<div class="relative flex-col  text-center flex items-center justify-center min-h-screen mx-4">
    <div class="bg-white text-gray-950 p-6 rounded-lg shadow-lg w-full max-w-md">

        <img src="{{ asset('storage/' . $appSetting->favicon) }}" alt="Hero Logo"
            class="w-auto h-20 object-contain items-center justify-center mx-auto mb-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Confirm Your Attendance</h2>
        <form action="{{ route('guest.store') }}" method="POST">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nama Anda"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-950 focus:outline-none" required>
            <input type="text" name="message" id="message" placeholder="Pesan Anda"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-950 focus:outline-none mt-2"
                required>

            <button type="submit"
                class="mt-4 w-full bg-pink-950 hover:bg-pink-900 text-white font-bold py-2 px-4 rounded-lg">
                Proceed to Invitation
            </button>
        </form>
    </div>
</div>
@endsection