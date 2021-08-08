<?php

namespace App\Http\Controllers\admin;

use App\Models\User;

class RestaurantController
{
    public function getAll()
    {
        $restaurants = User::query()->select(
            'users.id', 'users.name', 'users.email', 'users.password', 'users.image', 'users.status',
            'users.phone', 'users.address', 'users.restaurant', 'users.status_action', 'users.status_ban', 'role_id'
        )->get()->where('role_id', '=', 3);
        return view('backend.admin.restaurant.list',compact('restaurants'));
    }

}
