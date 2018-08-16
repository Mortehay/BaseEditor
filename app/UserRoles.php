<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'u_id', 'role',
    ];
}
