<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Widget Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Guest Count -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-base sm:text-lg font-semibold text-gray-700">Total Guest</h3>
                        <p class="text-2xl sm:text-3xl font-bold text-blue-600 mt-2">
                            {{ $guestCount }}
                        </p>
                    </div>
                    <i class="fa-solid fa-users text-gray-400 text-3xl sm:text-4xl"></i>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>