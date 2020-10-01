<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flavour_types')->truncate();
        $flavours = DB::connection('8bitvape_old')->table('flavour')->select('type')->groupBy('type')->get();

        foreach ($flavours as $flavour) {
            $data = [
                ['name' => $flavour->type],
            ];
            DB::table('flavour_types')->insert($data);
        }
    }
}
