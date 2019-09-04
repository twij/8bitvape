<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            $this->call([
                UsersTableSeeder::class,
                CompanyTypeTableSeeder::class,
                ProductTypeTableSeeder::class,
                BaseIngredientTableSeeder::class,
                FlavourCompaniesTableSeeder::class,
                FlavourTypesTableSeeder::class,
                FlavourTableSeeder::class,
                MixTypesTableSeeder::class,
                CommentsTableSeeder::class,
                MixesTableSeeder::class
            ]);
        }
        if (App::environment('testing')) {
            $this->call([
                \Database\Seeds\Tests\UsersTableSeeder::class,
                \Database\Seeds\Tests\FlavourCompaniesTableSeeder::class,
                \Database\Seeds\Tests\FlavourTableSeeder::class,
                \Database\Seeds\Tests\MixesTableSeeder::class,
                \Database\Seeds\Tests\PagesTableSeeder::class,
                \Database\Seeds\Tests\ProductsTableSeeder::class,
                \Database\Seeds\Tests\PriceOptionsTableSeeder::class,
            ]);
        }
    }
}
