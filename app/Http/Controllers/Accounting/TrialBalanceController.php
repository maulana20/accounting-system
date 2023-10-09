<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coa;

class TrialBalanceController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $trialBalances = Coa::trialBalance()->get();
        
        return view('accounting.trial-balance.index', compact('trialBalances', 'from_date', 'to_date'));
    }
}
