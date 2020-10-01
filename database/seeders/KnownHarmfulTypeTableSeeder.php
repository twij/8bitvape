<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KnownHarmfulTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('known_harmful_types')->truncate();
        $data = [
            //todo
        ];

        DB::table('known_harmful_types')->insert($data);
    }
}
