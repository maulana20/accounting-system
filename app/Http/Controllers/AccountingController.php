<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coa;
use App\GlAnalysis;

class AccountingController extends Controller
{
    public function journal(Request $request)
    {
        $journal = GlAnalysis::journal([
            'from_date' => '2018-10-01 00:00:00',
            'to_date'   => '2018-12-31 23:59:59'
        ])->get();
        return view('journal', compact('journal'));
    }

    public function generalLedger(Request $request)
    {
        $generalLedgers = GlAnalysis::generalLedger([
            'from_date' => '2018-10-01 00:00:00',
            'to_date'   => '2018-12-31 23:59:59',
        ])->sumBalance()->get();
        return view('general-ledger', compact('generalLedgers'));
    }

    public function trialBalance(Request $request)
    {
        $trialBalances = Coa::trialBalance([
            'from_date' => '2018-10-01 00:00:00',
            'to_date'   => '2018-12-31 23:59:59',
        ])->get();
        return view('trial-balance', compact('trialBalances'));
    }
}