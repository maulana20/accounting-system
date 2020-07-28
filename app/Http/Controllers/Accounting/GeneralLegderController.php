<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\GeneralLedger;

class GeneralLegderController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $coa_id = $request->get('coa_id');
        
        $general_ledger = (new GeneralLedger())->search($coa_id, $from_date, $to_date);
        
        return view('accounting.general-ledger.index', compact('general_ledger', 'from_date', 'to_date', 'coa_id'));
    }
}
