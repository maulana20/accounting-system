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
        
        $gl_analysis = GlAnalysis::select('coa.id', 'coa.code', 'coa.name', 'gl_analysis.desc', 'gl_analysis.position', 'gl_analysis.value', 'financial_trans.vou')
            ->join('coa', 'coa.id', '=', 'gl_analysis.coa_from')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analysis.financial_trans_id')
            ->whereIn('gl_analysis.financial_trans_id', [$inter_cash_bank->financial_trans_in, $inter_cash_bank->financial_trans_out])
            ->orderBy('gl_analysis.financial_trans_id', 'ASC')
            ->orderBy('gl_analysis.position', 'ASC')
            ->get();
        
        return view('finance.inter-cash-bank.show', compact('inter_cash_bank', 'gl_analysis'));
    }
}
