<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role'=>'admin'
        ]);
        Role::create([
            'role'=>'finance'
        ]);

        Admin::create([
            'username' => 'admin1',
            'password' => Hash::make('password123'),
            'id_role' => 1,
        ]);

        Admin::create([
            'username' => 'admin2',
            'password' => Hash::make('password123'),
            'id_role' => 1,
        ]);

        Admin::create([
            'username' => 'admin3',
            'password' => Hash::make('password123'),
            'id_role' => 2,
        ]);

        Admin::create([
            'username' => 'admin4',
            'password' => Hash::make('password123'),
            'id_role' => 2,
        ]);
    }
}
