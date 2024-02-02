<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterCashBank extends Model
{
    protected $fillable = [
        'financial_trans_in',
        'financial_trans_out',
    ];

    public function financialTransIn()
    {
        return $this->belongsTo(financialTrans::class, 'financial_trans_in', 'id');
    }

    public function financialTransOut()
    {
        return $this->belongsTo(financialTrans::class, 'financial_trans_out', 'id');
    }

    public function scopeOrderByTrans($query)
    {
        return $query->select('inter_cash_banks.*')
            ->join('financial_trans', 'financial_trans.id', '=', 'inter_cash_banks.financial_trans_in')
            ->orderBy('financial_trans.created_at', 'DESC');
    }
}
