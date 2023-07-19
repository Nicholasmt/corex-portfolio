<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['title'=>'Admin','privillege'=>1,'created_at'=>date('Y:m:d H:s:i'),'updated_at'=>date('Y:m:d H:s:i')]);
    }
}
