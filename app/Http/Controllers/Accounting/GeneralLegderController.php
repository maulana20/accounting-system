<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\FinancialTrans;

class GeneralLegderController extends Controller
{
    public function index(Request $request)
    {
        $general_ledger = FinancialTrans::selectRaw('gl_analysis.coa_to, gl_analysis.coa_from, coa.name, financial_trans.period_begin, financial_trans.created_at, gl_analysis.desc')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=1 AND posting.period_begin=201810) as begining')
            ->selectRaw('(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE 0 END) AS debet, (CASE WHEN gl_analysis.position = 1 THEN gl_analysis.value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=1 AND posting.period_begin=201810) + (SELECT @ending := @ending+(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE gl_analysis.value * -1 END) FROM (SELECT @ending := 0) i) As ending')
            ->join('gl_analysis', 'gl_analysis.financial_trans_id', '=', 'financial_trans.id')
            ->join('period', 'period.begin', '=', 'financial_trans.period_begin')
            ->join('coa', 'coa.id', '=', 'gl_analysis.coa_from')
            ->where('gl_analysis.coa_to', 1)
            ->where('financial_trans.period_begin', '201811')
            ->get();
        
        return view('accounting.general-ledger.index', compact('general_ledger'));
    }
}
