<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['name'=>'Do an nhanh'],
                ['name'=>'Mon an truyen thong'],
                ['name'=>'Am thuc nhat ban'],
                ['name'=>'Am thuc phuong tay'],
            ]
        );
    }
}
