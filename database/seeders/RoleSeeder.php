<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Permission::create([
        'name' => 'Show users'
      ]);


      $admin = Role::create(['name' => 'Admin']);
      $admin->syncPermissions([1]);

      Role::create(['name' => 'Coordinator']);
    }
}
