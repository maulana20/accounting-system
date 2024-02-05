<?php

namespace App\Traits;

use Illuminate\Database\Query\JoinClause;
use App\Enums\PositionEnum;

trait JournalTrait
{
    public function scopeJournal($query, $filter)
    {
        return $query->select('financial_trans_id', 'coa_to', 'position', 'financial_trans.created_at')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analyses.financial_trans_id')
            ->selectRaw('SUM(value) as value')
            ->groupBy('financial_trans_id', 'coa_to', 'position', 'financial_trans.created_at')
            ->whereBetween('financial_trans.created_at', [
                $filter['from_date'],
                $filter['to_date']
            ])
            ->orderBy('financial_trans_id', 'DESC')
            ->orderBy('position', 'ASC');
    }

    public function scopeGeneralLedger($query, $filter)
    {
        return $query->select('gl_analyses.*')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_to')
            ->leftJoin('postings', function (JoinClause $join) use ($filter) {
                $period = \Carbon\Carbon::parse($filter['from_date'])->format('Ym');
                $join->on('gl_analyses.coa_to', 'postings.coa_id')
                    ->where('postings.period_begin', $period);
            })
            ->whereHas('financialTrans', function ($trans) use ($filter) {
                $trans->whereBetween('financial_trans.created_at', [
                    $filter['from_date'] . " 00:00:00",
                    $filter['to_date'] . " 23:59:59"
                ]);
            })
            ->when($filter['coa_id'] ?? null, fn ($query, $coaId) => $query->where('coa_to', $coaId))
            ->orderBy('coas.code', 'ASC');
    }

    public function scopeSumBalance($query)
    {
        $period = \Carbon\Carbon::parse(request()->to_date)->format('Ym');
        return $query->selectRaw('
            (SELECT @balance  := (CASE WHEN period_begin = ' . $period . ' THEN 0 ELSE balance END)),
            (SELECT @begining := (CASE WHEN balance IS NOT NULL THEN @balance ELSE 0 END)),
            (SELECT @ending   := (CASE WHEN @coa_id = coa_to THEN @ending ELSE 0 END)),
            (SELECT @coa_id   := coa_to),

            @balance as begining,
            @begining + (SELECT @ending := @ending + (CASE WHEN position = ' . PositionEnum::DEBET . ' THEN value ELSE value * -1 END)) as ending');
    }

    public function scopeCountBalance($query)
    {
        $period = \Carbon\Carbon::parse(request()->to_date)->format('Ym');
        return $query->selectRaw('SUM(CASE WHEN position = ' . PositionEnum::DEBET . ' THEN value ELSE 0 END) AS debet')
            ->selectRaw('SUM(CASE WHEN position = ' . PositionEnum::CREDIT . ' THEN value ELSE 0 END) AS credit')
            ->selectRaw('
                (CASE WHEN period_begin = ' . $period . ' THEN 0 ELSE balance END) as begining,
                (CASE WHEN balance IS NOT NULL THEN(CASE WHEN period_begin = ' . $period . ' THEN 0 ELSE balance END) ELSE 0 END)
                + SUM(CASE WHEN position = ' . PositionEnum::DEBET . ' THEN value ELSE value * -1 END) AS ending')
            ->groupBy('period_begin', 'balance');
    }
}