<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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
