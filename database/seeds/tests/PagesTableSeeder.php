<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesTableSeeder extends Seeder
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
                    'slug' => Str::slug('Arctic Purple', '-'),
                    'path' => '/arctic-purple',
                    'title' => 'Arctic Purple shortfill by 8VitVape',
                    'user_id' => 1,
                    'include' => 'pages/arcticpurple',
                ],
            ];
            
            DB::table('pages')->insert($data);
        }
    }
}