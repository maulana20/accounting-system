<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\GroupAccount;
use App\Coa;

class BalanceSheetController extends Controller
{
    public function index(Request $request)
    {
        $activa = GroupAccount::where('type', 1)
                    ->selectRaw('*, (SELECT GROUP_CONCAT(CONCAT(coas.id, "@", coas.code, "@", coas.name)) FROM coas WHERE coas.group_account_id=group_accounts.id AND coas.lod = 5) AS coa_list')
                    ->orderBy('id', 'ASC')
                    ->get();
        
        $passiva = GroupAccount::where('type', 2)
                    ->orderBy('id', 'ASC')
                    ->get();
        
        $coa_data = NULL;
        if (in_array($request->get('action'), ['edit']) && $request->has('id')) $coa_data = Coa::find($request->get('id'));
        
        return view('accounting.balancesheet-account.index', compact('activa', 'passiva', 'coa_data'));
    }
}
