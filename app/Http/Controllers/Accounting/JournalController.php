<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\FinancialTrans;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $journal = FinancialTrans::selectRaw('coa.code, coa.name, financial_trans.period_begin, period.status, financial_trans.created_at, gl_analysis.desc, gl_analysis.position')
            ->selectRaw('SUM(CASE WHEN gl_analysis.position = 1 THEN gl_analysis.value ELSE 0 END) AS debet, SUM(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE 0 END) AS credit')
            ->join('gl_analysis', 'gl_analysis.financial_trans_id', '=', 'financial_trans.id')
            ->join('period', 'period.begin', '=', 'financial_trans.period_begin')
            ->join('coa', 'coa.id', '=', 'gl_analysis.coa_from')
            ->where('financial_trans.id', 1)
            ->groupBy('coa.code', 'coa.name', 'financial_trans.period_begin', 'period.status', 'financial_trans.created_at', 'gl_analysis.desc', 'gl_analysis.position')
            ->orderBy('debet', 'DESC')
            ->get();
        
        return view('accounting.journal.index', compact('journal'));
    }
}
