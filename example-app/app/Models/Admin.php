<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'permission'
    ];




    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function setPermissionAttribute($per){
        return $this->attributes["permission"]=implode("+",$per);
    }

    public function getPermissionAttribute($per){
        return explode("+",$per);
    }

}
