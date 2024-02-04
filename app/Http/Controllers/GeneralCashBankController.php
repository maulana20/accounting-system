<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralCashBank;
use App\Enums\PositionEnum;

class GeneralCashBankController extends Controller
{
    public function index(Request $request)
    {
        $generalCashBank = GeneralCashBank::orderByTrans([
            'from_date' => '2018-10-01 00:00:00',
            'to_date'   => '2018-12-31 23:59:59',
        ])->get();
        return view('general-cash-bank.index', compact('generalCashBank'));
    }
    
    public function show(GeneralCashBank $generalCashBank)
    {
        $analysis = $generalCashBank->financialTrans->glAnalysis()->position($generalCashBank->position)->get();
        return view('general-cash-bank.show', compact('generalCashBank', 'analysis'));
    }
}
