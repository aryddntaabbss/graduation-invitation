<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Guest
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('admin.guests.update', $guest) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $guest->name) }}" required
                            class="w-full mt-1 px-3 py-2 border rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea name="message" rows="4"
                            class="w-full mt-1 px-3 py-2 border rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500">{{ old('message', $guest->message) }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('admin.guests.index') }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-4 py-2 rounded-lg mr-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>