<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\FinancialTrans;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        
        $journal = FinancialTrans::selectRaw('coas.code, coas.name, financial_trans.id, financial_trans.period_begin, periods.status, financial_trans.created_at, gl_analyses.desc, gl_analyses.position')
            ->selectRaw('SUM(CASE WHEN gl_analyses.position = 1 THEN gl_analyses.value ELSE 0 END) AS debet, SUM(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE 0 END) AS credit')
            ->join('gl_analyses', 'gl_analyses.financial_trans_id', '=', 'financial_trans.id')
            ->join('periods', 'periods.begin', '=', 'financial_trans.period_begin')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_from')
            //->where('financial_trans.id', 1)
            ->groupBy('coas.code', 'coas.name', 'financial_trans.id', 'financial_trans.period_begin', 'periods.status', 'financial_trans.created_at', 'gl_analyses.desc', 'gl_analyses.position')
            
            ->orderBy('financial_trans.id', 'ASC')
            ->orderBy('debet', 'DESC')
            ->get();
        
        return view('accounting.journal.index', compact('journal', 'from_date', 'to_date'));
    }
}
