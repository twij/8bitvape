<?php

use Illuminate\Database\Seeder;
use App\Mix;
use Illuminate\Support\Facades\DB;
use App\User;

class MixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mixes')->truncate();
        $mixes = DB::connection('8bitvape_old')->table('useritem')
                        ->join('commix', 'useritem.uniquecode', '=', 'commix.itemID')
                        ->select('useritem.*', 'commix.*')->get();
        foreach ($mixes as $mix) {
            $newMix = new Mix;

            $user = User::where('username', strtolower($mix->username))->first();

            $user->xp += 1000; //give +1000 points for being cool
            $user->save();

            $newMix->user_id = $user->id;
            $newMix->type_id = 1;
            $newMix->name = $mix->name;
            $newMix->slug = $mix->itemID;
            $newMix->description = $mix->description;
            $newMix->notes = 'Imported from the old 8bv DB.';
            $newMix->creator_rating = $mix->rating;
            $newMix->enabled = true;
            $newMix->save();

            $flavours = explode(' ', $mix->flavours);

            foreach ($flavours as $flavour) {
                if ($flavour) {
                    $mixFlavour = explode(':', $flavour);
                    $newFlavour = DB::table('flavours')->where('slug', $mixFlavour[0])->first();
                    $percentage = $mixFlavour[1];
                    if ($newFlavour) {
                        $newMix->flavours()->attach($newFlavour->id, ['percentage' => $percentage]);
                    }
                }
            }

            //$this->command->getOutput()->writeln(dd($mix));

            $comments = DB::connection('8bitvape_old')->table('comcomments')->where('mixID', '=', $mix->ID)->get();

            foreach ($comments as $comment) {
                $commentuser = User::where('username', strtolower($comment->user))->first();

                if ($commentuser == null) {
                    $userId = 0;
                } else {
                    $userId = $commentuser->id;
                    $commentuser->xp += 500; //xp for being cool
                    $commentuser->save();
                }

                $data = [
                    ['user_id' => $userId,
                    'related_id' => $newMix->id,
                    'related_type' => 'App\Mix',
                    'rating' => $comment->rating,
                    'comment' => $comment->review,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')]
                ];
                DB::table('comments')->insert($data);
            }
        }
        $this->command->getOutput()->writeln("<info>Flavours seeded OK!</info>");
    }
}
