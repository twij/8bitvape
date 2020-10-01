<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('base_ingredients')->truncate();
        $data = [
            ['name' => 'Vegetable Glycerine', 'slug' => 'vg',
                'description' => 'A common e-liquid base fluid. High viscosity and known for producing thick, heavy clouds.'],
            ['name' => 'Propylene Glycol', 'slug' => 'pg',
                'description' => 'The original e-liquid base fluid. Known for producing string throat hit.',
                'notes' => 'Can irritate the throat. Some people may be allergic.'],
            ['name' => 'Polyethylene Glycol', 'slug' => 'peg400',
                'description' => 'A less common base fluid. Can be useful to suspend certain chemicals that other bases may struggle with.'],
            ['name' => 'Water', 'slug' => 'h2o',
                'description' => 'Destilled and deionised water can be used to lower the viscosity of an e-liquid to promote faster wicking.',
                'warning' => 'Ensure to use pure distilled water to avoid contaminants.'],
            ];

        DB::table('base_ingredients')->insert($data);
    }
}
