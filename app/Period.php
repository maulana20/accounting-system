<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public static $statics = [
        'type' => [
            '1' => 'Open',
            '2' => 'Posting',
            '3' => 'Closing',
        ]
    ];
}
