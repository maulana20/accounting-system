<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCashBank extends Model
{
    protected $table = 'general_cash_bank';
    
    public static $statics = [
        'position' => [
            '1' => 'Kas Bank Masuk',
            '2' => 'Kas Bank Keluar',
        ]
    ];
}
