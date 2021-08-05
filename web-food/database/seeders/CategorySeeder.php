<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate=new Category();
        $cate->name= 'Rice';
        $cate->save();

        $cate=new Category();
        $cate->name= 'Noddles';
        $cate->save();

        $cate=new Category();
        $cate->name= 'Bread';
        $cate->save();
    }
}
