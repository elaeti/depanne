<?php

use Illuminate\Database\Seeder;

class Profilseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

        ['tel'=>"78",
        'name'=>"azd",
        'prenom'=>"el",
        'password'=>"admin123",
        'email'=>"a@a",
        'role'=>"ouvrier",
        'profillable_id'=>"1",
        'profillable_type'=>"ouvrier",
        ]

        ]);
}
}