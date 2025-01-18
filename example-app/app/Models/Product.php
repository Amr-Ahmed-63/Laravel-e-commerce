<?php

namespace App\Models;

use App\Models\image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'sale',
        'count',
        'category'
    ];

    public function image(){
        return $this->hasMany(image::class);
    }
}
