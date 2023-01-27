<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'employee_id' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'employee_id' => 2,
                'email' => 'pegawai@gmail.com',
                'password' => bcrypt('pegawai'),
                'role' => 'pegawai',
            ]
        ]);
    }
}
