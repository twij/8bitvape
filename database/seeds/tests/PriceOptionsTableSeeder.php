<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PriceOptionsTableSeeder extends Seeder
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
                    'product_id' => 1,
                    'name' => '100ml 78% VG 22% Flavour (120ml short filled)',
                    'price' => 10.00,
                    'info' => 'plus shipping',
                    'stock' => 1,
                ],
            ];
            
            DB::table('price_options')->insert($data);
        }
    }
}