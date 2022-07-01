<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GeneralData::class);
        $this->call(EmployeeSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
