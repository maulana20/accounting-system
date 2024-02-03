<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coa;
use App\GlAnalysis;

class AccountingController extends Controller
{
    public function journal(Request $request)
    {
        $journal = GlAnalysis::journal()->get();
        return view('journal', compact('journal'));
    }

    public function generalLedger(Request $request)
    {
        $generalLedgers = GlAnalysis::generalLedger()->get();
        return view('general-ledger', compact('generalLedgers'));
    }

    public function trialBalance(Request $request)
    {
        $trialBalances = Coa::trialBalance()->get();
        return view('trial-balance', compact('trialBalances'));
    }
}