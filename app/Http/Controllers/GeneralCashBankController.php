<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coa;
use App\GeneralCashBank;
use App\Enums\PositionEnum;
use App\Services\GeneralCashBankFormService;

class GeneralCashBankController extends Controller
{
    public function index(Request $request)
    {
        $generalCashBank = GeneralCashBank::orderByTrans()->get();
        
        return view('general-cash-bank.index', compact('generalCashBank'));
    }
    
    public function show(GeneralCashBank $generalCashBank, GeneralCashBankFormService $formService)
    {
        $form = $formService->form;
        $listing = $formService->listing;
        $coas = Coa::pluckCode();
        $positionEnum = PositionEnum::class;
        
        return view('general-cash-bank.show', compact('form', 'listing', 'coas', 'positionEnum'));
    }
}
