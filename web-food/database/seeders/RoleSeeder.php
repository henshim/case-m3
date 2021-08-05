<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name='Admin';
        $role->description='Web admin';
        $role->save();

        $role = new Role();
        $role->name='Customer';
        $role->description='Web customer';
        $role->save();

        $role = new Role();
        $role->name='User';
        $role->description='Web user';
        $role->save();
    }
}
