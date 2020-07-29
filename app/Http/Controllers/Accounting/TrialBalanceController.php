<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\TrialBalance;

class TrialBalanceController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        
        $trial_balance = (new TrialBalance())->search($from_date, $to_date);
        
        return view('accounting.trial-balance.index', compact('trial_balance', 'from_date', 'to_date'));
    }
}
