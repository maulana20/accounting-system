<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coa;
use App\GlAnalysis;
use App\Enums\PositionEnum;

class AccountingController extends Controller
{
    public function journal(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $journal = GlAnalysis::journal()->get();
        $positionEnum = PositionEnum::class;
        return view('journal', compact('journal', 'positionEnum', 'from_date', 'to_date'));
    }

    public function generalLedger(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $coa_id = $request->get('coa_id');
        $generalLedgers = GlAnalysis::generalLedger()->get();
        $positionEnum = PositionEnum::class;
        return view('general-ledger', compact('generalLedgers', 'positionEnum', 'from_date', 'to_date', 'coa_id'));
    }

    public function trialBalance(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $trialBalances = Coa::trialBalance()->get();
        return view('trial-balance', compact('trialBalances', 'from_date', 'to_date'));
    }
}