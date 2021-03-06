<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        if (\App::environment('testing')) {
            $data = [
                [
                    'name' => 'Cupcake World',
                    'slug' => Str::slug('Cupcake World', '-'),
                    'user_id' => 1,
                    'company_type' => 1
                ],
            ];
            
            DB::table('flavour_companies')->insert($data);
        }
    }
}
