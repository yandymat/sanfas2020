<?php

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Admin',
            'slug'=>'admin',
        ]);

        DB::table('roles')->insert([
            'name'=>'Moderateur',
            'slug'=>'moderateur',
        ]);
    }
}
