<?php namespace Database\Seeds\Tests;

use Illuminate\Database\Seeder;
use App\Models\Mix;
use Illuminate\Support\Facades\DB;

class MixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App::environment('testing')) {
            $mix = new Mix;

            $mix->user_id = 1;
            $mix->type_id = 1;
            $mix->name = 'Tropical Space Pirate';
            $mix->slug = 'spacepirate';
            $mix->description = 'Blast off into outer space with this tropical concoction, sure to tickle your taste buds. Reminds us of lime starbursts. This is very popular with our local customers! Contains a mix of Lime, Pineapple and Passion fruit.';
            $mix->creator_rating = 5;
            $mix->enabled = true;
            $mix->save();

            $mix->flavours()->attach(1, ['percentage' => 5]);
            $mix->flavours()->attach(2, ['percentage' => 5]);
            $mix->flavours()->attach(3, ['percentage' => 10]);

            $data = [
                'user_id' => 1,
                'related_id' => $mix->id,
                'related_type' => 'App\Models\Mix',
                'rating' => 5,
                'comment' => 'I liked it',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            DB::table('comments')->insert($data);
        }

    }
}
