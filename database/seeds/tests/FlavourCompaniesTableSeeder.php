<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $data = [
            [
                'name' => 'Cupcake World',
                'slug' => str_slug('Cupcake World', '-'),
                'user_id' => 1,
                'company_type' => 1
            ],
        ];
        
        DB::table('flavour_companies')->insert($data);

    }
}
