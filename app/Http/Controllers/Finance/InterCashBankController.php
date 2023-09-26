<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\InterCashBank;
use App\GlAnalysis;

class InterCashBankController extends Controller
{
    public function index(Request $request)
    {
        $inter_cash_bank = (new InterCashBank())->show();
        
        return view('finance.inter-cash-bank.index', compact('inter_cash_bank'));
    }
    
    public function show($id)
    {
        $inter_cash_bank = (new InterCashBank())->show($id);
        
        $gl_analysis = GlAnalysis::select('coas.id', 'coas.code', 'coas.name', 'gl_analyses.desc', 'gl_analyses.position', 'gl_analyses.value', 'financial_trans.vou')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_from')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analyses.financial_trans_id')
            ->whereIn('gl_analyses.financial_trans_id', [$inter_cash_bank->financial_trans_in, $inter_cash_bank->financial_trans_out])
            ->orderBy('gl_analyses.financial_trans_id', 'ASC')
            ->orderBy('gl_analyses.position', 'ASC')
            ->get();
        
        return view('finance.inter-cash-bank.show', compact('inter_cash_bank', 'gl_analysis'));
    }
}
