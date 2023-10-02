<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InterCashBank;
use App\Coa;
use App\Services\InterCashBankFormService;

class InterCashBankController extends Controller
{
    public function index(Request $request)
    {
        $interCashBanks = InterCashBank::orderByTrans()->get();
        
        return view('finance.inter-cash-bank.index', compact('interCashBanks'));
    }
    
    public function show(InterCashBank $interCashBank, InterCashBankFormService $formService)
    {
        $form = $formService->form;
        $listing = $formService->listing;
        $coas = Coa::pluckCode();
        
        return view('finance.inter-cash-bank.show', compact('form', 'listing', 'coas'));
    }
}
