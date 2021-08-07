<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function food()
    {
        return $this->hasOne(Foods::class,'food_id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }
}
