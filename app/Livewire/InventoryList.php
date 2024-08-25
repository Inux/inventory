<?php

namespace App\Livewire;

use App\Models\StorageItem;
use Livewire\Component;

class InventoryList extends Component
{
    public string $search = '';
    public $storageItems;
    public $newItem = [];

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->storageItems = StorageItem::all();
    }

    public function increment($id)
    {
        $storageItem = StorageItem::find($id);
        $storageItem->count++;
        $storageItem->save();
    }

    public function decrement($id)
    {
        $storageItem = StorageItem::find($id);
        if ($storageItem->count > 0) {
            $storageItem->count--;
            $storageItem->save();
        }
    }

    public function addItem()
    {
        try {
            $this->validate([
                'newItem.name' => 'required|string|max:255',
                'newItem.description' => 'nullable|string|max:1000',
                'newItem.count' => 'required|integer|min:0',
                'newItem.expiration_date' => 'nullable|date|after:today',
            ]);

            StorageItem::create($this->newItem);
            $this->newItem = [];
            session()->flash('message', 'Item added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->addError('newItem', 'Validation failed. Please check your input.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while adding the item. Please try again.');
        }
    }

    public function render()
    {
        $this->storageItems = StorageItem::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.inventory-list', [
            'storageItems' => $this->storageItems,
        ]);
    }
}
