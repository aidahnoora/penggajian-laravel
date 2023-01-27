<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Aidah',
                'position_id' => 1,
                'gender' => 'Perempuan',
                'address' => 'Pacitan, Jawa Timur',
                'phone' => '081212',
                'work_start_date' => '2023/01/22',
                'bank_type' => 'Mandiri',
                'account_number' => '6544',
                'loan' => 0,
            ],
            [
                'name' => 'Vidi',
                'position_id' => 1,
                'gender' => 'Laki-laki',
                'address' => 'Pacitan, Jawa Timur',
                'phone' => '081212',
                'work_start_date' => '2023-01-22',
                'bank_type' => 'Mandiri',
                'account_number' => '6545',
                'loan' => 0,
            ]
        ]);
    }
}
