<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StorageItem>
 */
class StorageItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'expiration_date' => strval(fake()->numberBetween(2025, 2030)),
            'count' => fake()->numberBetween(1, 50),
            'storage_id' => null,
        ];
    }

    public function withStorage(int $storageId)
    {
        return $this->state([
            'storage_id' => $storageId,
        ]);
    }
}
