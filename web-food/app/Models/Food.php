<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(TagFood::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cate()
    {
        return $this->belongsTo(Category::class);
    }
}
