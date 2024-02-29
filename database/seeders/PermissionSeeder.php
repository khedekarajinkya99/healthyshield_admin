<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArray = [
            [
                'name' => 'Menus',
                'status' => 2
            ],
            [
                'name' => 'Roles',
                'status' => 2
            ],
            [
                'name' => 'Settings',
                'status' => 2
            ]
        ];
        Permission::insert($dataArray);
    }
}
