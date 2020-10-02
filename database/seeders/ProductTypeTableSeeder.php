<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->truncate();
        $data = [
            [
                'name' => 'Flavour Concentrates',
                'slug' => 'flavour-concetrates',
                'description' => 'Concentrated flavourings suitable to use in e-liquid.'
            ],
            [
                'name' => 'Base Ingredients',
                'slug' => 'base-ingredients',
                'description' => 'Base ingredients for e-liquid, e.g. VG, PG, Water etc.'
            ],
            [
                'name' => 'Nicotine Base',
                'slug' => 'nicotine-base',
                'description' => 'Concentrated nicotine base to mix down.'
            ],
            [
                'name' => 'Mixing Supplies',
                'slug' => 'mixing-supplies',
                'description' => 'Mixing equipments like bottles, syringes, beakers etc.'
            ],
            [
                'name' => 'Low-end Hardware',
                'slug' => 'low-end-hardware',
                'description' => 'Cheap, beginner level e-cigarette devices.'
            ],
            [
                'name' => 'High-end Hardware',
                'slug' => 'high-end-hardware',
                'description' => 'Mods, RDAs, Tanks etc.'
            ],
            [
                'name' => 'Premixed E-Liquid',
                'slug' => 'premixed-e-liquid',
                'description' => 'Ready to vape e-liquid.'
            ],
            [
                'name' => 'Supplies',
                'slug' => 'supplies',
                'description' => 'General e-cigarette supplies e.g. Wire, Coils, Cotton etc.'
            ],
        ];

        DB::table('product_types')->insert($data);
    }
}
