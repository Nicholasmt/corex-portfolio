<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['role_id'=>1,'name'=>'Tochukwu Nicholas','email'=>'nicholasmt09@gmail.com','password'=>\Hash::make('12345678'),'created_at'=>date('Y:m:d H:s:i'),'updated_at'=>date('Y:m:d H:s:i')]);
    }
}
