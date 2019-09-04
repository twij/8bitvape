<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
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
                    'name' => 'Arctic Purple',
                    'slug' => Str::slug('Arctic Purple', '-'),
                    'product_code' => '#8bv00007',
                    'description' => 'Limited Edition',
                    'page_id' => 1,
                    'enabled' => 1
                ],
                [
                    'name' => 'Secret Mix',
                    'slug' => Str::slug('Secret Mix', '-'),
                    'product_code' => '#8bv00008',
                    'description' => 'exists?',
                    'page_id' => 1,
                    'enabled' => 1
                ],
            ];
            
            DB::table('products')->insert($data);
        }
    }
}