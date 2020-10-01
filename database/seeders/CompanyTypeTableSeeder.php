<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        DB::table('company_types')->truncate();
        $data = [
            ['name' => 'Retail', 'slug' => 'retail', 'description' => 'Retail companies sell products directly to consumers.'],
            ['name' => 'Manufacturer', 'slug' => 'manufacturer', 'description' => 'Manufactures create and distribute products. They may or may not sell directly to consumers.'],
            ['name' => 'Wholesaler', 'slug' => 'wholesaler', 'description' => 'Wholesalers sell products in bulk for a discounted price.'],
            ['name' => 'Imported', 'slug' => 'imported', 'description' => 'WThese companies have been imported from the old 8bv database. Their information needs updating.'],
        ];

        DB::table('company_types')->insert($data);
    }
}
