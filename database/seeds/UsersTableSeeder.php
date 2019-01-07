<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        	'name' => 'Administration',
        	'username' => 'admin',
        	'email' => 'admin@gmail.com',
        	'role_id' => '1',
        	'password' => bcrypt('adminadmin')
        ]);

        DB::table('users')->insert([
        	'name' => 'Author',
        	'username' => 'author',
        	'email' => 'author@gmail.com',
        	'role_id' => '2',
        	'password' => bcrypt('author'),
        ]);    }
}
