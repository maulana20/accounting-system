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
        $query->select('general_cash_banks.*')
            ->join('financial_trans', 'financial_trans.id', '=', 'general_cash_banks.financial_trans_id')
            ->orderBy('financial_trans.created_at', 'DESC');
        return $query;
    }
}
