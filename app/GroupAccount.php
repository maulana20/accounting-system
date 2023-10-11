<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAccount extends Model
{
    public static $statics = [
        'type' => [
            '1' => 'Aktiva',
            '2' => 'Passiva',
        ]
    ];

    public function coas()
    {
        return $this->hasMany(Coa::class);
    }

    public function scopeActiva($query)
    {
        return $query->where('type', 1);
    }

    public function scopePassiva($query)
    {
        return $query->where('type', 2);
    }
}
