<?php

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
        //
        DB::table('flavours')->truncate();
        $flavours = DB::connection('8bitvape_old')->table('flavour')->select(DB::raw('*, type as flavour_type'))->get();
        foreach($flavours as $flavour){
            $company = DB::table('flavour_companies')->where('name', $flavour->company)->first();
            $flavourType = DB::table('flavour_types')->where('name', $flavour->flavour_type)->first();

            $data = [
                ['name' => $flavour->description,
                'slug' => $flavour->name,
                'flavour_company_id' => $company->id,
                'flavour_type_id' => $flavourType->id,
                'user_id' => 1,
                'description' => $flavour->fulldesc,
                'notes' => 'Imported from the old 8bv db. Information needs updating',
                'enabled' => true],
            ];
            DB::table('flavours')->insert($data);
        }
        $this->command->getOutput()->writeln("<info>Flavours seeded OK!</info>");
    }
}
