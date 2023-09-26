<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\GeneralCashBank;
use App\GlAnalysis;

class GeneralCashBankController extends Controller
{
    public function index(Request $request)
    {
        $general_cash_bank = GeneralCashBank::select('general_cash_banks.id', 'financial_trans.period_begin', 'financial_trans.vou', 'users.name', 'financial_trans.vou', 'financial_trans.created_at')
            ->join('financial_trans', 'financial_trans.id', '=', 'general_cash_banks.financial_trans_id')
            ->join('users', 'users.id', '=', 'financial_trans.user_id')
            //->whereRaw('financial_trans.created_at >= NOW() - INTERVAL 3 MONTH')
            ->orderBy('financial_trans.created_at', 'DESC')
            ->get();
        
        return view('finance.general-cash-bank.index', compact('general_cash_bank'));
    }
    
    public function show($id)
    {
        $general_cash_bank = (new GeneralCashBank())->show($id);
        
        $gl_analysis = GlAnalysis::select('coas.id', 'coas.code', 'coas.name', 'gl_analyses.desc', 'gl_analyses.position', 'gl_analyses.value')
            ->join('coas', 'coas.id', '=', 'gl_analyses.coa_from')
            ->where('financial_trans_id', $general_cash_bank->id)
            ->where('coa_to', $general_cash_bank->coa_id)
            ->get();
        
        return view('finance.general-cash-bank.show', compact('general_cash_bank', 'gl_analysis'));
    }
}
