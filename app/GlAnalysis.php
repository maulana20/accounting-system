<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use App\Enums\PositionEnum;

class GlAnalysis extends Model
{
    public function financialTrans()
    {
        return $this->belongsTo(FinancialTrans::class, 'financial_trans_id', 'id');
    }

    public function coaFrom()
    {
        return $this->belongsTo(Coa::class, 'coa_from', 'id');
    }

    public function coaTo()
    {
        return $this->belongsTo(Coa::class, 'coa_to', 'id');
    }

    public function scopePosition($query, $position)
    {
        return $query->where('position', $position);
    }

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
                    $filter['from_date'],
                    $filter['to_date']
                ]);
            })
            ->when($filter['coa_id'] ?? null, fn ($query, $coaId) => $query->where('coa_to', $coaId))
            ->orderBy('coas.code', 'ASC');
    }

    public function scopeSumBalance($query)
    {
        return $query->selectRaw('
            (SELECT @begining := (CASE WHEN balance IS NOT NULL THEN balance ELSE 0.0 END)),
            (SELECT @ending   := (CASE WHEN @coa_id = gl_analyses.coa_to THEN @ending ELSE 0.0 END)),
            (SELECT @coa_id   := gl_analyses.coa_to),

            @begining as begining,
            @begining + (
                SELECT @ending := @ending + (CASE WHEN gl_analyses.position = ' . PositionEnum::DEBET . ' THEN gl_analyses.value ELSE gl_analyses.value * -1 END)
                FROM (SELECT @coa_id := 0, @begining := 0, @ending := 0)
            i) as ending');
    }

    public function scopeCountBalance($query)
    {
        return $query->selectRaw('
            balance as begining,
            balance + SUM(CASE WHEN position = ' . PositionEnum::DEBET . ' THEN value ELSE value * -1 END) AS ending');
    }

    public function scopeTransInOut($query, $data)
    {
        return $query->whereIn('financial_trans_id', [
                $data->financial_trans_out,
                $data->financial_trans_in
            ])->orderBy('financial_trans_id', 'ASC');
    }
}
