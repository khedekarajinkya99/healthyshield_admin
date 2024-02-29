<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Administrator')->select('id')->first();
        
        $permission = Permission::where('status', 2)->get();
        foreach ($permission as $values) {
            $rolePermission = new RolePermission;
            $rolePermission->role_id = $role->id;
            $rolePermission->permission_id = $values->id;
            $rolePermission->right = 3;

            $rolePermission->save();
        }
    }
}
