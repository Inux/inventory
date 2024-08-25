<div>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-2 text-gray-200 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <input type="text" placeholder="🔍 Search" wire:model.live.debounce.300ms="search" class="grow bg-gray-200 dark:bg-gray-800 rounded-xl">
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-200 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="addItem" class="p-4">
                    <div class="grid grid-cols-5 gap-4">
                        <input type="text" wire:model="newItem.name" placeholder="Name" class="col-span-1 bg-gray-700 rounded px-2 py-1">
                        <input type="text" wire:model="newItem.description" placeholder="Beschreibung" class="col-span-1 bg-gray-700 rounded px-2 py-1">
                        <input type="number" wire:model="newItem.count" placeholder="Anzahl" class="col-span-1 bg-gray-700 rounded px-2 py-1">
                        <input type="date" wire:model="newItem.expiration_date" placeholder="Ablauf Datum" class="col-span-1 bg-gray-700 rounded px-2 py-1">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md overflow-hidden">Hinzufügen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-200 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full table-fixed text-center overflow-hidden">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Beschreibung</th>
                            <th>Anzahl</th>
                            <th>Ablauf Datum</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($storageItems->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Keine Artikel gefunden</td>
                        </tr>
                        @else
                        @foreach ($storageItems as $storageItem)
                        <tr class="border-t border-gray-200 border-opacity-10 border-0">
                            <td>{{ $storageItem->name }}</td>
                            <td>{{ $storageItem->description }}</td>
                            <td>{{ $storageItem->count }}</td>
                            <td>{{ $storageItem->expiration_date }}</td>
                            <td>
                                <div class="flex gap-2 justify-center h-1/2 w-full">
                                    <button wire:click="increment({{ $storageItem->id }})" class="bg-blue-500 text-white text-sm rounded-md">➕</button>
                                    <button wire:click="decrement({{ $storageItem->id }})" class="bg-red-500 text-white text-sm rounded-md">➖</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>