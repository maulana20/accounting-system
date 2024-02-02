<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCashBank extends Model
{
    public function financialTrans()
    {
        return $this->belongsTo(FinancialTrans::class);
    }

    public function scopeOrderByTrans($query)
    {
        return $query->select('general_cash_banks.*')
            ->join('financial_trans', 'financial_trans.id', '=', 'general_cash_banks.financial_trans_id')
            ->whereBetween('financial_trans.created_at', [
                '2018-10-01 00:00:00',
                '2018-12-31 23:59:59'
            ])
            ->orderBy('financial_trans.created_at', 'DESC');
    }
}
