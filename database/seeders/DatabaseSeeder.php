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
        $this->call(RoleSeeder::class);       
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventVersionSeeder::class);
        $this->call(TeamSeeder::class);
    }
}
