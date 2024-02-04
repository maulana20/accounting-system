<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

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

    public function scopeOrderByTrans($query, $filter)
    {
        return $query->select('inter_cash_banks.*')
            ->join('financial_trans', function (JoinClause $join) use ($filter) {
                $join->on('financial_trans.id', 'inter_cash_banks.financial_trans_in')
                    ->whereBetween('financial_trans.created_at', [
                        $filter['from_date'],
                        $filter['to_date']
                    ]);
            })
            ->orderBy('financial_trans.created_at', 'DESC');
    }
}
