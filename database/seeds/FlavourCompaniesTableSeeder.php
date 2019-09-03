<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FlavourCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flavour_companies')->truncate();
        $flavours = DB::connection('8bitvape_old')->table('flavour')->select('company')->groupBy('company')->get();

        foreach ($flavours as $flavour) {
            $data = [
                ['name' => $flavour->company,
                'slug' => Str::slug($flavour->company, '-'),
                'user_id' => 1,
                'company_type' => 1],
            ];
            DB::table('flavour_companies')->insert($data);
        }
    }
}
