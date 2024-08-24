<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name'=> 'Admin Tochukwu',
        'email'=>'admin@admin.com',
        'role_id'=>1,
        'password'=>Hash::make('12345678')
      ]);
    }
}
