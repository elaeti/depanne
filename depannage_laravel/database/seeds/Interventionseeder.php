<?php

use Illuminate\Database\Seeder;

class Interventionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intervention')->insert([
            'ouvriers_id' => "1",
            'annonces_id' => "1",
            'date_fin' => "2020/10/12",
            'note' => "8"
            
        ]);
    }
}
