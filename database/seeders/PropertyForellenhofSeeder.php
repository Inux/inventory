<?php

namespace Database\Seeders;

use App\Models\StorageItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyForellenhofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = DB::table('addresses')->insertGetId([
            'street' => 'Moos',
            'street_number' => '18',
            'zipcode' => '6022',
            'city' => 'Grosswangen',
            'country' => 'Schweiz'
        ]);

        $forellenhof = DB::table('properties')->insertGetId([
            'name' => 'Forellenhof',
            'description' => 'Mehrgenerationen-Haus mit Permakultur und Hundezucht',
            'address_id' => $address
        ]);

        $house = DB::table('buildings')->insertGetId([
            'property_id' => $forellenhof,
            'name' => 'Haus',
            'construction_year' => 1967,
        ]);

        $barn = DB::table('buildings')->insertGetId([
            'property_id' => $forellenhof,
            'name' => 'Scheune',
            'construction_year' => 1967,
        ]);

        $gabiChristian = DB::table('areas')->insertGetId([
            'building_id' => $house,
            'name' => 'Gabi & Christian',
        ]);

        $selineRemo = DB::table('areas')->insertGetId([
            'building_id' => $house,
            'name' => 'Seline & Remo',
        ]);

        $miriamSteve = DB::table('areas')->insertGetId([
            'building_id' => $house,
            'name' => 'Miriam & Steve',
        ]);

        $common = DB::table('areas')->insertGetId([
            'building_id' => $house,
            'name' => 'Gemeinschaft',
        ]);

        $keller = DB::table('rooms')->insertGetId([
            'area_id' => $common,
            'name' => 'Keller',
            'floor' => 'UG'
        ]);

        $kellerMittelteil = DB::table('locations')->insertGetId([
            'room_id' => $keller,
            'name' => 'Keller Mittelteil',
        ]);

        $ksLinks = DB::table('storages')->insertGetId([
            'location_id' => $kellerMittelteil,
            'name' => 'Kühlschrank Links',
        ]);

        $ksMitte = DB::table('storages')->insertGetId([
            'location_id' => $kellerMittelteil,
            'name' => 'Kühlschrank Mitte',
        ]);

        $ksRechts = DB::table('storages')->insertGetId([
            'location_id' => $kellerMittelteil,
            'name' => 'Kühlschrank Rechts',
        ]);

        $ksLinksItems = StorageItem::factory()
            ->count(5)
            ->create();

        $ksMitteItems = StorageItem::factory()
            ->count(5)
            ->create();

        $ksRechtsItems = StorageItem::factory()
            ->count(5)
            ->create();
    }
}
