<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupAccount;
use App\Coa;

class BalanceSheetController extends Controller
{
    public function index(Request $request)
    {
        $activa = GroupAccount::activa()->get();
        $passiva = GroupAccount::passiva()->get();
        $coaData = in_array($request->get('action'), ['edit']) && $request->has('id') ? Coa::find($request->get('id')) : null;        
        return view('balancesheet-account.index', compact('activa', 'passiva', 'coaData'));
    }
}
