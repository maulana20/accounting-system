<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FinancialTrans;

class GeneralLedger extends Model
{
    public function record($coa_id)
    {
        $result = FinancialTrans::selectRaw('gl_analysis.coa_to, gl_analysis.coa_from, coa.code, coa.name, financial_trans.id, financial_trans.period_begin, financial_trans.created_at, gl_analysis.desc')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=1 AND posting.period_begin=201810) as begining')
            ->selectRaw('(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE 0 END) AS debet, (CASE WHEN gl_analysis.position = 1 THEN gl_analysis.value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=1 AND posting.period_begin=201810) + (SELECT @ending := @ending+(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE gl_analysis.value * -1 END) FROM (SELECT @ending := 0) i) As ending')
            ->join('gl_analysis', 'gl_analysis.financial_trans_id', '=', 'financial_trans.id')
            ->join('period', 'period.begin', '=', 'financial_trans.period_begin')
            ->join('coa', 'coa.id', '=', 'gl_analysis.coa_from')
            ->where('gl_analysis.coa_to', $coa_id)
            ->where('financial_trans.period_begin', '201811')
            ->orderBy('gl_analysis.coa_to', 'ASC')
            ->get();
        
        return $result;
    }
    
    public function search($coa_id, $from_date, $to_date)
    {
        $financial_trans = FinancialTrans::selectRaw('gl_analysis.coa_to as coa_id, coa.code as coa_to')
            ->join('gl_analysis', 'gl_analysis.financial_trans_id', '=', 'financial_trans.id')
            ->join('coa', 'coa.id', '=', 'gl_analysis.coa_to')
            ->where('financial_trans.period_begin', '201811')
            ->groupBy('gl_analysis.coa_to', 'coa.code')
            ->orderBy('coa.code', 'ASC')
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
