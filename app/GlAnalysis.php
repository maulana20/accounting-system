<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlAnalysis extends Model
{
    public static $statics = [
        'position' => [
            '1' => 'Debet',
            '2' => 'Credit',
        ]
    ];
}
