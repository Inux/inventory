<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h4>All store items</h4>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Expiration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($storageItems as $storageItem)
                        <tr>
                            <td>{{ $storageItem->name }}</td>
                            <td>{{ $storageItem->description }}</td>
                            <td>{{ $storageItem->count }}</td>
                            <td>{{ $storageItem->expiration_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>