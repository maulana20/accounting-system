<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GlAnalysis;
use App\Enums\PositionEnum;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $journal = GlAnalysis::journal()->get();
        $positionEnum = PositionEnum::class;
        
        return view('accounting.journal.index', compact('journal', 'positionEnum', 'from_date', 'to_date'));
    }
}
