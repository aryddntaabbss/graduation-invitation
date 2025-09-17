<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Widget Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Guest Count -->
                <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Total Guest</h3>
                        <p class="text-3xl font-bold text-blue-600 mt-2">
                            {{ $guestCount }}
                        </p>
                    </div>
                    <svg class="w-12 h-12 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5V10H2v10h5m10 0v-6H7v6m10 0h-4v-6h4v6z" />
                    </svg>
                </div>

                <!-- Widget lain bisa ditambah di sini -->
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Widget Lain</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        0
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>