<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            [
                ['name'=>'Healthy cung FFD'],
                ['name'=>'Sale up 70%'],
                ['name'=>'Bua an 1k'],
                ['name'=>'An cung nguoi noi tieng'],
            ]
        );
    }
}
