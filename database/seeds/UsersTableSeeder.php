<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'  =>  '1',
            'name'     =>  'YD.Admin',
            'username' =>  'admin',
            'email'    =>  'admin@sanfas.com',
            'password' =>  bcrypt('lemental48'),
        ]);

        DB::table('users')->insert([
            'role_id'  =>  '2',
            'name'     =>  'BM.Moderateur',
            'username' =>  'Moderateur',
            'email'    =>  'moderateur@sanfas.com',
            'password' =>  bcrypt('moderateursanfas'),
        ]);
    }
}
