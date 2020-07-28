<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    protected $table = 'coa';
    
    public static $statics = [
        'type' => [
            '1' => 'Aktiva',
            '2' => 'Hutang Usaha',
            '3' => 'Piutang Usaha',
            '4' => 'Pendapatan dan Beban lain lain',
            '5' => 'Biaya Pemasaran',
            '6' => 'Biaya Usaha',
            '7' => 'Kas dan Bank',
            '8' => 'Pembelian',
            '9' => 'PPh Pajak 23',
            '10' => 'PPn Keluaran',
            '11' => 'Passiva',
            '12' => 'Penjualan',
        ],
        'lod' => [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ]
    ];
}
