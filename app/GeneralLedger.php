<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FinancialTrans;

class GeneralLedger extends Model
{
    public function record($coa_id)
    {
        $result = FinancialTrans::selectRaw('gl_analyses.coa_to, gl_analyses.coa_from, coas.code, coas.name, financial_trans.id, financial_trans.period_begin, financial_trans.created_at, gl_analyses.desc')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=1 AND postings.period_begin=201810) as begining')
            ->selectRaw('(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE 0 END) AS debet, (CASE WHEN gl_analyses.position = 1 THEN gl_analyses.value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=1 AND postings.period_begin=201810) + (SELECT @ending := @ending+(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE gl_analyses.value * -1 END) FROM (SELECT @ending := 0) i) As ending')
            ->join('gl_analyses', 'gl_analyses.financial_trans_id', '=', 'financial_trans.id')
            ->join('periods', 'periods.begin', '=', 'financial_trans.period_begin')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_from')
            ->where('gl_analyses.coa_to', $coa_id)
            ->where('financial_trans.period_begin', '201811')
            ->orderBy('gl_analyses.coa_to', 'ASC')
            ->get();
        
        return $result;
    }
    
    public function search($coa_id, $from_date, $to_date)
    {
        $financial_trans = FinancialTrans::selectRaw('gl_analyses.coa_to as coa_id, coas.code as coa_to')
            ->join('gl_analyses', 'gl_analyses.financial_trans_id', '=', 'financial_trans.id')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_to')
            ->where('financial_trans.period_begin', '201811')
            ->groupBy('gl_analyses.coa_to', 'coas.code')
            ->orderBy('coas.code', 'ASC')
            ->get();
        
        $result = [];
        foreach ($financial_trans as $value) {
            foreach ($this->record($value->coa_id) as $data) {
                $data['coa_to'] = $value->coa_to;
                $result[] = $data;
            }
        }
        
        return $result;
    }
}
