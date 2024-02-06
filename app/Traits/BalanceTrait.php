<?php

namespace App\Traits;

use Illuminate\Database\Query\JoinClause;

trait BalanceTrait
{
    public function scopeTrialBalance($query, $filter)
    {
        return $query->select('coas.*')
            ->with(['glAnalysis' => function ($analysis) use ($filter) {
                $analysis->generalLedger($filter)
                    ->select('coa_to')
                    ->countBalance()
                    ->groupBy('coa_to');
            }])->orderBy('code', 'ASC');
    }
}