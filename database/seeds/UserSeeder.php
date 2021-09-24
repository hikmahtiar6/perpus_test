<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin
        DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        // create nonadmin
        DB::table('users')->insert([
            'name' => "nonadmin",
            'email' => 'nonadmin@gmail.com',
            'level' => 'nonadmin',
            'password' => Hash::make('nonadmin'),
        ]);
    }
}
