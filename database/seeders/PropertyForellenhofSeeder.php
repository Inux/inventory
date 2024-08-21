<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertyForellenhofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = Address::factory([
            'street' => 'Forellenhof',
            'street_number' => '',
            'zipcode' => '6022',
            'city' => 'Grosswangen',
            'country' => 'Schweiz',
            'additional_information' => ''
        ])->create();
        $address->save();

        $forellenhof = Property::factory([
            'name' => 'Forellenhof',
            'description' => 'Mehrgenerationen-Haus mit Permakultur und Hundezucht',
            'construction_year' => 1967,
            'address_id' => $address->id
        ])->create();

        $forellenhof->save();
    }
}
