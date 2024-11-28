<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('cars.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Car</a>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Brand</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Year</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td class="border px-4 py-2">{{ $car->brand }}</td>
                                    <td class="border px-4 py-2">{{ $car->name }}</td>
                                    <td class="border px-4 py-2">{{ $car->year_of_manufacture }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cars.show', $car) }}" class="text-blue-500">View</a>
                                        <a href="{{ route('cars.edit', $car) }}" class="ml-2 text-green-500">Edit</a>
                                        <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
