<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        "products_id",
        "count"
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
