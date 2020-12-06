<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $guarded = ['id'];

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }
}
