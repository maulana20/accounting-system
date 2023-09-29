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

    public function coas(): BelongsTo
    {
        return $this->hasMany(Coa::class);
    }
}
