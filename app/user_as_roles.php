<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_as_roles extends Model
{
    //

    protected $fillable = [
        'user_id', 'roles_id'
    ];


}
