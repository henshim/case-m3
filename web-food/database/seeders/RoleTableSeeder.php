<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                ['name'=>'customer','description'=>'nguoi mua hang'],
                ['name'=>'admin','description'=>'qyantrivien'],
                ['name'=>'kitchen','description'=>'nguoi mua hang'],
            ],
        );
    }
}
