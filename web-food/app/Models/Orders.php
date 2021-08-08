<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class,'user_id');
    }

    public function restaurant()
    {
        return $this->hasOne(User::class,'restaurant_id');
    }

    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class,'order_id');
    }
}
