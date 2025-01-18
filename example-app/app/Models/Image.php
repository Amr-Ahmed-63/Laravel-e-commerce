<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id',
        'image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public static function saveImg( $product_id , $image )
    // {

    //         // Image::create([
    //         //     "product_id"=>$product_id,
    //         //     "image"=>$image,
    //         // ]);
    //     }
    }

