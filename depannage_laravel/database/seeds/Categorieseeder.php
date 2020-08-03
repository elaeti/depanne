<?php

use Illuminate\Database\Seeder;

class Categorieseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ["libelle"=>"depannage"],
            ["libelle"=>"assistance"]
        ]);

        
    }
}
