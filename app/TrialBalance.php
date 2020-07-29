<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\GroupAccount;

class TrialBalance extends Model
{
    public function record($coa_id)
    {
        $result = GroupAccount::selectRaw('group_account.id, group_account.name, coa.id as coa_id, coa.code as coa_code, coa.name as coa_name, group_account.parent')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=coa.id AND posting.period_begin=201810) as begining')
            ->selectRaw('SUM(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE 0 END) AS debet')
            ->selectRaw('SUM(CASE WHEN gl_analysis.position = 1 THEN gl_analysis.value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=coa.id AND posting.period_begin=201810) + SUM(CASE WHEN gl_analysis.position = 2 THEN gl_analysis.value ELSE gl_analysis.value * -1 END) AS ending')
            ->join('coa', 'coa.group_account_id', '=', 'group_account.id')
            ->join('gl_analysis', 'gl_analysis.coa_to', '=', 'coa.id')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analysis.financial_trans_id')
            ->where('financial_trans.period_begin', '201811')
            ->where('coa.id', $coa_id)
            ->groupBy('group_account.id', 'group_account.name', 'coa.id', 'coa.code', 'coa.name', 'group_account.parent')
            ->orderBy('coa.id', 'ASC')
            ->get();
         
         return $result;
    }
    
    public function search($from_date, $to_date)
    {
        $group_account = GroupAccount::selectRaw('group_account.id, group_account.name, coa.id as coa_id, coa.code as coa_code, coa.name as coa_name, group_account.parent')
            ->selectRaw('(SELECT balance FROM posting WHERE posting.coa_id=coa.id AND posting.period_begin=201810) as begining')
            ->join('coa', 'coa.group_account_id', '=', 'group_account.id')
            ->groupBy('group_account.id', 'group_account.name', 'coa.id', 'coa.code', 'coa.name', 'group_account.parent')
            ->orderBy('group_account.id', 'ASC')
            ->orderBy('coa.id', 'ASC')
            ->get();
        
        $result = [];
        foreach ($group_account as $value) {
            $record = $this->record($value->coa_id);
            $result[] = (!empty($record->toArray())) ? $record[0] : $value;
        }
        
        return $result;
    }
}
