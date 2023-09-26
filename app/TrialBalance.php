<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\GroupAccount;

class TrialBalance extends Model
{
    public function record($coa_id)
    {
        $result = GroupAccount::selectRaw('group_accounts.id, group_accounts.name, coas.id as coa_id, coas.code as coa_code, coas.name as coa_name, group_accounts.parent')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coas.id AND postings.period_begin=201810) as begining')
            ->selectRaw('SUM(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE 0 END) AS debet')
            ->selectRaw('SUM(CASE WHEN gl_analyses.position = 1 THEN gl_analyses.value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coas.id AND postings.period_begin=201810) + SUM(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE gl_analyses.value * -1 END) AS ending')
            ->join('coas', 'coas.group_account_id', '=', 'group_accounts.id')
            ->join('gl_analyses', 'gl_analyses.coa_to', '=', 'coas.id')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analyses.financial_trans_id')
            ->where('financial_trans.period_begin', '201811')
            ->where('coas.id', $coa_id)
            ->groupBy('group_accounts.id', 'group_accounts.name', 'coas.id', 'coas.code', 'coas.name', 'group_accounts.parent')
            ->orderBy('coas.id', 'ASC')
            ->get();
         
         return $result;
    }
    
    public function search($from_date, $to_date)
    {
        $group_account = GroupAccount::selectRaw('group_accounts.id, group_accounts.name, coas.id as coa_id, coas.code as coa_code, coas.name as coa_name, group_accounts.parent')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coas.id AND postings.period_begin=201810) as begining')
            ->join('coas', 'coas.group_account_id', '=', 'group_accounts.id')
            ->groupBy('group_accounts.id', 'group_accounts.name', 'coas.id', 'coas.code', 'coas.name', 'group_accounts.parent')
            ->orderBy('group_accounts.id', 'ASC')
            ->orderBy('coas.id', 'ASC')
            ->get();
        
        $result = [];
        foreach ($group_account as $value) {
            $record = $this->record($value->coa_id);
            $result[] = (!empty($record->toArray())) ? $record[0] : $value;
        }
        
        return $result;
    }
}
