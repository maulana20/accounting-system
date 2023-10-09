<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GlAnalysis;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $journal = GlAnalysis::journal()->get();
        
        return view('accounting.journal.index', compact('journal', 'from_date', 'to_date'));
    }
}
