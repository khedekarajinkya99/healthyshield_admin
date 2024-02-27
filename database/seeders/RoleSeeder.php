<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role;
        $role->name = 'Administrator';
        $role->display_name = 'Administrator';
        $role->status = 2;
        $role->save();
    }
}
