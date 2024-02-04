<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlAnalysis;
use App\InterCashBank;

class InterCashBankController extends Controller
{
    public function index(Request $request)
    {
        $interCashBanks = InterCashBank::orderByTrans([
            'from_date' => '2018-10-01 00:00:00',
            'to_date'   => '2018-12-31 23:59:59',
        ])->get();
        return view('inter-cash-bank.index', compact('interCashBanks'));
    }
    
    public function show(InterCashBank $interCashBank)
    {
        $analysis = GlAnalysis::transInOut($interCashBank)->get();
        return view('inter-cash-bank.show', compact('interCashBank', 'analysis'));
    }
}
