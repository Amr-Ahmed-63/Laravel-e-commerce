<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'user_id',
        'permissions'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
