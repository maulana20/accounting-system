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

    public function scopeJournal($query)
    {
        return $query->select('financial_trans_id', 'coa_from', 'position', 'financial_trans.created_at')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analyses.financial_trans_id')
            ->selectRaw('SUM(value) as value')
            ->groupBy('financial_trans_id', 'coa_from', 'position', 'financial_trans.created_at')
            ->whereBetween('financial_trans.created_at', [
                '2018-10-01 00:00:00',
                '2018-12-31 23:59:59'
            ])
            ->orderBy('financial_trans_id', 'DESC')
            ->orderBy('position', 'ASC');
    }

    public function scopeGeneralLedger($query)
    {
        return $query->select('gl_analyses.*', 'balance as begining')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_to')
            ->join('postings', function (JoinClause $join) {
                $join->on('gl_analyses.coa_to', 'postings.coa_id')
                    ->where('postings.period_begin', '201810');
            })
            ->whereHas('financialTrans', function ($trans) {
                $trans->whereBetween('financial_trans.created_at', [
                    '2018-10-01 00:00:00',
                    '2018-12-31 23:59:59'
                ]);
            })
            ->orderBy('coas.code', 'ASC');
    }

    public function scopeTransInOut($query, $data)
    {
        return $query->whereIn('financial_trans_id', [
                $data->financial_trans_out,
                $data->financial_trans_in
            ])->orderBy('financial_trans_id');
    }
}
