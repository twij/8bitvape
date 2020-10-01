<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavourStrengthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flavour_strengths')->truncate();
        $data = [
            ['name' => 'Weak'],
            ['name' => 'Moderate'],
            ['name' => 'Strong'],
            ['name' => 'Extreme'],
        ];

        DB::table('flavour_strengths')->insert($data);
    }
}
