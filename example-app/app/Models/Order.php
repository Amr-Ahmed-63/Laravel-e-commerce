<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        "products_id"
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
