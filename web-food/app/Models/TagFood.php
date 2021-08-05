<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagFood extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
