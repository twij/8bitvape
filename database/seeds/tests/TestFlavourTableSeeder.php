<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavourTableSeeder extends Seeder
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
                    'name' => 'Pineapple',
                    'slug' => 'pineapple',
                    'flavour_company_id' => 1,
                    'flavour_type_id' => 1,
                    'user_id' => 1,
                    'description' => 'A mighty pineapple blast. Adds a tropical twist to any flavour.',
                    'enabled' => true
                ],
                [
                    'name' => 'Lime',
                    'slug' => 'lime',
                    'flavour_company_id' => 1,
                    'flavour_type_id' => 1,
                    'user_id' => 1,
                    'description' => 'A sharp citrus tang. Nicely intense.',
                    'enabled' => true
                ],
                [
                    'name' => 'Passion Fruit',
                    'slug' => 'passionfruit',
                    'flavour_company_id' => 1,
                    'flavour_type_id' => 1,
                    'user_id' => 1,
                    'description' => 'The incredibly versatile taste of this south American favourite works great in plenty of mixes, complementing both dessert and fruit based concoctions alike.',
                    'enabled' => true
                ]
            ];
            DB::table('flavours')->insert($data);
        }
    }
}
