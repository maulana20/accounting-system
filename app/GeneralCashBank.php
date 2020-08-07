<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCashBank extends Model
{
    protected $table = 'general_cash_bank';
    
    public static $statics = [
        'position' => [
            '1' => 'Kas Bank Masuk',
            '2' => 'Kas Bank Keluar',
        ]
    ];
    
    public function show($id)
    {
        $general_cash_bank = GeneralCashBank::select('general_cash_bank.id', 'financial_trans.period_begin', 'general_cash_bank.position', 'period.status')
            ->selectRaw("(SELECT MAX(a.created_at) FROM gl_analysis AS a INNER JOIN coa AS b ON b.id=a.coa_from WHERE a.financial_trans_id=financial_trans.id AND a.position=general_cash_bank.position) AS 'created_at'")
            ->selectRaw("(SELECT MAX(b.id) FROM gl_analysis AS a INNER JOIN coa AS b ON b.id=a.coa_from WHERE a.financial_trans_id=financial_trans.id AND a.position=general_cash_bank.position) AS 'coa_id'")
            ->selectRaw("(SELECT MAX(a.desc) FROM gl_analysis AS a INNER JOIN coa AS b ON b.id=a.coa_from WHERE a.financial_trans_id=financial_trans.id AND a.position=general_cash_bank.position) AS 'desc'")
            ->join('financial_trans', 'financial_trans.id', '=', 'general_cash_bank.financial_trans_id')
            ->join('period', 'period.begin', '=', 'financial_trans.period_begin')
            ->where('general_cash_bank.id', $id)
            ->first();
        
        return $general_cash_bank;
    }
}
