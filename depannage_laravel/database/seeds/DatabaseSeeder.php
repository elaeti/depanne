<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(Categorieseeder::class);
        $this->call(Profilseeder::class);
        $this->call(Annonceseed::class);
        $this->call(Interventionseeder::class);
    }
}
