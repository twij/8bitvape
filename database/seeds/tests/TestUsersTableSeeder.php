<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'barf@8bv.uk',
            'username' => 'barf',
            'password' => bcrypt('lolnicepassword'),
            'type' => 'admin'
        ];

        DB::table('users')->insert($data);

    }
}
