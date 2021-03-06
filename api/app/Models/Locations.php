<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'category', 'lat', 'lng'
    ];
}
