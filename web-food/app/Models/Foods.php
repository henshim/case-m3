<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(Tags::class,'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class,'food_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id');
    }
}
