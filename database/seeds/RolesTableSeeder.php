<?php

use Illuminate\Database\Seeder;
use Putheng\Role\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	['name' => 'admin'],
        	['name' => 'user'],
        ];

        Role::insert($roles);
    }
}
