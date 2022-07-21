<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Team::create([
        'name' => 'Team 1',
        'color' => 'red',
        'state' => 'Active'
      ]);
      Team::create([
        'name' => 'Team 2',
        'color' => 'green',
        'state' => 'Active'
      ]);
      Team::create([
        'name' => 'Team 3',
        'color' => 'yellow',
        'state' => 'Active'
      ]);
    }
}
