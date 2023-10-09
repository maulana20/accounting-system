<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GlAnalysis;

class GeneralLegderController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $coa_id = $request->get('coa_id');
        $generalLedgers = GlAnalysis::generalLedger()->get();
        
        return view('accounting.general-ledger.index', compact('generalLedgers', 'from_date', 'to_date', 'coa_id'));
    }
}
