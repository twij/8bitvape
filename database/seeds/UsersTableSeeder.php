<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $data = ['email' => 'barf@8bv.uk',
                 'username' => 'barf',
                 'password' => bcrypt('lolnicepassword'),
                 'type' => 'admin'];

        DB::table('users')->insert($data);

        $users = DB::connection('8bitvape_old')->table('commix')->select(DB::raw('username'))->groupBy('username')->get();
        foreach($users as $user){
            $data = [
                'username' => strtolower($user->username),
                'password' => 'notarealpassword',
                'enabled' => false,
                'imported' => true
            ];
            if($user->username != 'barf'){
                DB::table('users')->insert($data);
            }
        }
        $this->command->getOutput()->writeln("<info>Users seeded OK!</info>");
    }
}
