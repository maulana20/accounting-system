<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralCashBank;
use App\Enums\PositionEnum;

class GeneralCashBankController extends Controller
{
    public function index(Request $request)
    {
        $generalCashBank = GeneralCashBank::orderByTrans()->get();
        return view('general-cash-bank.index', compact('generalCashBank'));
    }
    
    public function show(GeneralCashBank $generalCashBank)
    {
        $analysis = $generalCashBank->financialTrans->glAnalysis()->position(
            $generalCashBank->position === PositionEnum::DEBET ? PositionEnum::CREDIT : PositionEnum::DEBET
        )->get();
        return view('general-cash-bank.show', compact('generalCashBank', 'analysis'));
    }
}
