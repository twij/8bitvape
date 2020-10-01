<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MixTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mix_types')->truncate();
        $data = [
            ['name' => 'Imported', 'description' => 'Mixes imported from the old 8bv db.'],
            ['name' => 'Original', 'description' => 'Original mixes.'],
            ['name' => 'Clone', 'description' => 'Mixes that are copies or imitations of other flavours.'],
            ['name' => 'Adaption', 'description' => 'Mixes adapted from other mixes.'],
        ];

        DB::table('mix_types')->insert($data);
    }
}
