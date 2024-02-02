<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coa;
use App\GlAnalysis;
use App\InterCashBank;
use App\Enums\PositionEnum;
use App\Services\InterCashBankFormService;

class InterCashBankController extends Controller
{
    public function index(Request $request)
    {
        $interCashBanks = InterCashBank::orderByTrans()->get();
        return view('inter-cash-bank.index', compact('interCashBanks'));
    }
    
    public function show(InterCashBank $interCashBank)
    {
        $analysis = GlAnalysis::transInOut($interCashBank)->get();
        $coas = Coa::pluckCode();
        $positionEnum = PositionEnum::class;
        return view('inter-cash-bank.show', compact('interCashBank', 'analysis', 'coas', 'positionEnum'));
    }
}
