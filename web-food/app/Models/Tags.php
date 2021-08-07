<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    public function food()
    {
        return $this->hasMany(Foods::class,'tag_id');
    }
}
