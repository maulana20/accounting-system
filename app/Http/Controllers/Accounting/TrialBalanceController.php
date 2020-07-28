<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\GroupAccount;

class TrialBalanceController extends Controller
{
    public function index(Request $request)
    {
        $trial_balance = GroupAccount::selectRaw('group_account.id, group_account.name, coa.id, coa.name, group_account.parent')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=coa.id AND posting.period_begin=201810) + SUM(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE gl_analysis.value * -1 END) AS balance_201811')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=coa.id AND posting.period_begin=201810) as begining_201810')
            ->join('coa', 'coa.group_account_id', '=', 'group_account.id')
            ->join('gl_analysis', 'gl_analysis.coa_to', '=', 'coa.id')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analysis.financial_trans_id')
            ->where('financial_trans.period_begin', '201811')
            ->groupBy('group_account.id', 'group_account.name', 'coa.id', 'coa.name', 'group_account.parent')
            ->orderBy('coa.id', 'ASC')
            ->get();
        
        return view('accounting.trial-balance.index', compact('trial_balance'));
    }
}
