<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coa;
use App\GeneralCashBank;

class GeneralCashBankController extends Controller
{
    public function index(Request $request)
    {
        $generalCashBank = GeneralCashBank::orderByTrans()->get();
        
        return view('finance.general-cash-bank.index', compact('generalCashBank'));
    }
    
    public function show(GeneralCashBank $generalCashBank)
    {
        $position = $generalCashBank->position == 2 ? 1 : 2;
        $glAnalysis = $generalCashBank->financialTrans->glAnalysis()->position($position)->get();
        $coaTo = $glAnalysis->first()->coaTo->id;
        $coas = Coa::get();
        
        return view('finance.general-cash-bank.show', compact('generalCashBank', 'glAnalysis', 'coaTo', 'coas'));
    }
}
