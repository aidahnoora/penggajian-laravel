<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'Manajer',
                'salary' => 2000000,
                'transport_allowance' => 200000,
                'meal_allowance' => 300000,
            ],
            [
                'name' => 'Pegawai',
                'salary' => 1000000,
                'transport_allowance' => 200000,
                'meal_allowance' => 300000,
            ]
        ]);
    }
}
