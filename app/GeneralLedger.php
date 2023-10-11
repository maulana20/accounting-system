<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\GlAnalysis;

class GeneralLedger extends Model
{
    public function scopeAnalysis($query)
    {
        return GlAnalysis::select('gl_analyses.*')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coa_to AND postings.period_begin=201810) as begining')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coa_to AND postings.period_begin=201810) + (SELECT @ending := @ending+(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE gl_analyses.value * -1 END) FROM (SELECT @ending := 0) i) As ending')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_to')
            ->whereHas('financialTrans', function ($trans) {
                $trans->where('period_begin', '201811');
            })
            ->orderBy('coas.code', 'ASC');
    }
}
