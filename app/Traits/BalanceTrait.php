<?php

namespace App\Traits;

use Illuminate\Database\Query\JoinClause;

trait BalanceTrait
{
    public function scopeTrialBalance($query, $filter)
    {
        return $query->select('coas.*')
            ->leftJoin('postings', function (JoinClause $join) use ($filter) {
                $period = \Carbon\Carbon::parse($filter['from_date'])->format('Ym');
                $join->on('coas.id', 'postings.coa_id')
                    ->where('postings.period_begin', $period);
            })
            ->with(['glAnalysis' => function ($analysis) use ($filter) {
                $analysis->generalLedger($filter)
                    ->select('coa_to')
                    ->countBalance()
                    ->groupBy('coa_to', 'balance');
            }])->orderBy('code', 'ASC');
    }
}