<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //
    protected $table="roles";

    protected $fillable = [
        'roles'
    ];

    public function users()
    {
        return $this->belongsToMany(roles::class, 'user_as_roles');
    }
}
