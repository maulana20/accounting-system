<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAccount extends Model
{
    protected $table = 'group_account';
    
    public static $statics = [
        'type' => [
            '1' => 'Aktiva',
            '2' => 'Passiva',
        ]
    ];
}
