<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeEnum;

class GroupAccount extends Model
{
    public function coas()
    {
        return $this->hasMany(Coa::class);
    }

    public function scopeActiva($query)
    {
        return $query->where('type', TypeEnum::ACTIVA);
    }

    public function scopePassiva($query)
    {
        return $query->where('type', TypeEnum::PASSIVA);
    }
}
