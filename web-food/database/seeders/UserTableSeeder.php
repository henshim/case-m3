<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name'=>'nam',
                    'email'=>'nam@gmail.com',
                    'password'=>Hash::make('123456789'),
                    'image'=>'chuacoanh',
                    'phone'=>'09977651',
                    'address'=>' 26 Le thanh nghi Hanoi',
                    'role_id'=>1,
                    'status_action'=>0,
                    'status_ban'=>0,
                ],
                [
                    'name'=>'bao',
                    'email'=>'bepbaobao@gmail.com',
                    'password'=>Hash::make('123456789'),
                    'image'=>'chuacoanh',
                    'phone'=>'09346651',
                    'address'=>' 26 Hao Nam Hanoi',
                    'role_id'=>3,
                    'status_action'=>0,
                    'status_ban'=>0,
                ],
                [
                    'name'=>'admin',
                    'email'=>'adminadmin@gmail.com',
                    'password'=>Hash::make('123456789'),
                    'image'=>'chuacoanh',
                    'phone'=>'111111111',
                    'address'=>' 235 Le Dai Hanh Hanoi',
                    'role_id'=>2,
                    'status_action'=>0,
                    'status_ban'=>0,
                ],
            ],
        );
    }
}
