<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class,'food_id');
    }
}
