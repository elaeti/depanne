<?php

use Illuminate\Database\Seeder;

class Annonceseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annonces')->insert([

            ['description' => "urgence panne",
            'users_id' => "1",
            'categories_id' => "1",
            ]
    
            ]);
    }
    }

