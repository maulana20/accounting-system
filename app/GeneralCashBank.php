<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

class GeneralCashBank extends Model
{
    public function financialTrans()
    {
        return $this->belongsTo(FinancialTrans::class);
    }

    public function scopeOrderByTrans($query, $filter)
    {
        return $query->select('general_cash_banks.*')
             ->join('financial_trans', function (JoinClause $join) use ($filter) {
                $join->on('financial_trans.id', 'general_cash_banks.financial_trans_id')
                    ->whereBetween('financial_trans.created_at', [
                        $filter['from_date'],
                        $filter['to_date']
                    ]);
            })
            ->orderBy('financial_trans.created_at', 'DESC');
    }
}
