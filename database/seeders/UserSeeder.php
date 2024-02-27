<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Language;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = new User;
        $users->name = 'Admin';
        $users->email = 'admin@gmail.com';
        $role = Role::where('name', 'Administrator')->select('id')->first();
        $users->role_id = $role->id;
        $language = Language::where('name', 'English')->select('id')->first();
        $users->language_id = $language->id;
        $users->password = Hash::make('admin');
        $users->status = 2;
        $users->save();
    }
}
