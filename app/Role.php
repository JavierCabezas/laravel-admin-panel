<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name', 'display_name', 'description', 'hidden'
    ];

    public static function getByDisplayName($display_name)
    {
        return Role::where('display_name', '=', $display_name)->get();
    }

}
