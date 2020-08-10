<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterCashBank extends Model
{
    protected $table = 'inter_cash_bank';
    
    public function show($id = NULL)
    {
        $inter_cash_bank = InterCashBank::select('inter_cash_bank.id', 'users.name', 'inter_cash_bank.financial_trans_in', 'inter_cash_bank.financial_trans_out', 'fintrans_in.vou as vou_in', 'fintrans_out.vou as vou_out', 'fintrans_in.period_begin', 'period.status', 'fintrans_in.created_at')
            ->selectRaw("(SELECT MAX(gl_analysis.value) FROM gl_analysis WHERE gl_analysis.financial_trans_id=inter_cash_bank.financial_trans_in) AS 'value'")
            ->selectRaw("(SELECT MAX(gl_analysis.desc) FROM gl_analysis WHERE gl_analysis.financial_trans_id=inter_cash_bank.financial_trans_in) AS 'desc'")
            ->selectRaw("(SELECT coa_from FROM gl_analysis WHERE gl_analysis.financial_trans_id=inter_cash_bank.financial_trans_out AND gl_analysis.position = 2) AS 'coa_from'")
            ->selectRaw("(SELECT coa_from FROM gl_analysis WHERE gl_analysis.financial_trans_id=inter_cash_bank.financial_trans_in AND gl_analysis.position = 1) AS 'coa_to'")
            ->join('financial_trans as fintrans_in', 'fintrans_in.id', '=', 'inter_cash_bank.financial_trans_in')
            ->join('financial_trans as fintrans_out', 'fintrans_out.id', '=', 'inter_cash_bank.financial_trans_out')
            ->join('users', 'users.id', '=', 'fintrans_in.user_id')
            ->join('period', 'period.begin', '=', 'fintrans_in.period_begin')
            ->orderBy('fintrans_in.created_at', 'DESC');
        
        if (!empty($id)) {
            $inter_cash_bank = $inter_cash_bank->where('inter_cash_bank.id', $id)->first();
        } else {
            // $inter_cash_bank = $inter_cash_bank->whereRaw('fintrans_in.created_at >= NOW() - INTERVAL 3 MONTH')->get();
            $inter_cash_bank = $inter_cash_bank->get();
        }
        
        return $inter_cash_bank;
    }
}
