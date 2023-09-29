<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    public function coas()
    {
        return $this->hasMany(Coa::class);
    }
}
