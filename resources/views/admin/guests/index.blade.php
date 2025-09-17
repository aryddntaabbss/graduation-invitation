<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Manage Guests
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('admin.guests.create') }}"
                    class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    + Add Guest
                </a>

                <table id="guestsTable" class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Message</th>
                            <th class="px-4 py-2">Slug</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $index => $guest)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $guest->name }}</td>
                            <td class="px-4 py-2">{{ $guest->message }}</td>
                            <td class="px-4 py-2">{{ $guest->slug }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.guests.edit', $guest) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.guests.destroy', $guest) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin mau hapus?')"
                                        class="text-red-600 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Tambah DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable('#guestsTable');
        });
    </script>
</x-app-layout>