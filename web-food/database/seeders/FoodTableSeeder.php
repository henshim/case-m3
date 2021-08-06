<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert(
            [
                [
                    'name'=>'Banh mi say sieu cap vip',
                    'image'=>'chuacoanh',
                    'description'=>'Banh my cay doc la nhieu dinh duong! Mang lai buoi sang tran day vi giac',
                    'price'=>30000,
                    'price_after_sale'=>18000,
                    'service_charge'=>0,
                    'preparation_time'=>3,
                    'tag_id'=>2,
                    'category_id'=>1,
                ],
                [
                    'name'=>'Com van phong',
                    'image'=>'chuacoanh',
                    'description'=>'Bua com tien loi  day chat dinh duong! Sieu ngon 100% ve sinh an toan thuc pham',
                    'price'=>40000,
                    'price_after_sale'=>26000,
                    'service_charge'=>0,
                    'preparation_time'=>5,
                    'tag_id'=>2,
                    'category_id'=>2,
                    'restaurant_id'=> 2,
                ],
                [
                    'name'=>'Che thap cam ba ba',
                    'image'=>'chuacoanh',
                    'description'=>'Ngon bo re',
                    'price'=>20000,
                    'price_after_sale'=>15000,
                    'service_charge'=>0,
                    'preparation_time'=>3,
                    'tag_id'=>2,
                    'category_id'=>1,
                    'restaurant_id'=> 2,

                ],
                [
                    'name'=>'Banh trang tron sieu cap',
                    'image'=>'chuacoanh',
                    'description'=>'Mon an so mot ve su tinh te',
                    'price'=>30000,
                    'price_after_sale'=>18000,
                    'service_charge'=>0,
                    'preparation_time'=>3,
                    'tag_id'=>2,
                    'category_id'=>1,
                    'restaurant_id'=> 2,
                ],
            ],
        );
    }
}
