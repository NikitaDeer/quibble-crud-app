<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cars.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="mb-4">
                                <ul class="list-disc list-inside text-red-500">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700">Brand:</label>
                            <input type="text" name="brand" id="brand" class="w-full px-3 py-2 border rounded" required value="{{ old('brand') }}">
                            @error('brand')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required value="{{ old('name') }}">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="year_of_manufacture" class="block text-gray-700">Year of Manufacture:</label>
                            <input type="number" name="year_of_manufacture" id="year_of_manufacture" class="w-full px-3 py-2 border rounded" required value="{{ old('year_of_manufacture') }}">
                            @error('year_of_manufacture')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-between">
                            <x-primary-button type="submit">
                                Add CarRRRRR
                            </x-primary-button>
                            <x-nav-link href="{{ route('cars.index') }}">
                                Back to List
                            </x-nav-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
