<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterCashBank;
use App\Coa;
use App\Enums\PositionEnum;
use App\Services\InterCashBankFormService;

class InterCashBankController extends Controller
{
    public function index(Request $request)
    {
        $interCashBanks = InterCashBank::orderByTrans()->get();
        
        return view('inter-cash-bank.index', compact('interCashBanks'));
    }
    
    public function show(InterCashBank $interCashBank, InterCashBankFormService $formService)
    {
        $form = $formService->form;
        $listing = $formService->listing;
        $coas = Coa::pluckCode();
        $positionEnum = PositionEnum::class;
        
        return view('inter-cash-bank.show', compact('form', 'listing', 'coas', 'positionEnum'));
    }
}
