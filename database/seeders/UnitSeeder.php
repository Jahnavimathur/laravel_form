<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'unit'=>'kilogram'
        ]);
        DB::table('units')->insert([
            'unit'=>'gram'
        ]);
        DB::table('units')->insert([
            'unit'=>'centimetres'
        ]);
        DB::table('units')->insert([
            'unit'=>'metres'
        ]);
    }
}
