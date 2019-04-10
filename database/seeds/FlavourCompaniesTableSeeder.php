<?php

use Illuminate\Database\Seeder;

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

        foreach($flavours as $flavour){
            $data = [
                ['name' => $flavour->company,
                'slug' => str_slug($flavour->company, '-'),
                'user_id' => 1,
                'company_type' => 1],
            ];
            DB::table('flavour_companies')->insert($data);
        }
    }
}
