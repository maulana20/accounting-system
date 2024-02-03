<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use App\Enums\PositionEnum;

class Coa extends Model
{
    public function groupAccount()
    {
        return $this->belongsTo(groupAccount::class);
    }

    public function glAnalysis()
    {
        return $this->hasMany(glAnalysis::class, 'coa_to', 'id');
    }

    public function scopePluckCode($query)
    {
        return $query->selectRaw("id, CONCAT_WS(' ', code, name) as name")->get()->pluck('name', 'id');
    }

    public function scopeTrialBalance($query)
    {
        return $query->select('coas.*', 'balance as begining')
            ->join('postings', function (JoinClause $join) {
                $join->on('coas.id', 'postings.coa_id')
                    ->where('postings.period_begin', '201810');
            })
            ->with(['glAnalysis' => function ($analysis) {
                $analysis->whereHas('financialTrans', function ($trans) {
                    $trans->whereBetween('financial_trans.created_at', [
                        '2018-10-01 00:00:00',
                        '2018-12-31 23:59:59'
                    ]);
                })
                ->select('coa_to')
                ->selectRaw('SUM(CASE WHEN position = ' . PositionEnum::CREDIT . ' THEN value ELSE 0 END) AS debet')
                ->selectRaw('SUM(CASE WHEN position = ' . PositionEnum::DEBET . ' THEN value ELSE 0 END) AS credit')
                ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coa_to AND postings.period_begin=201810) + SUM(CASE WHEN gl_analyses.position = ' . PositionEnum::CREDIT . ' THEN gl_analyses.value ELSE gl_analyses.value * -1 END) AS ending')
                ->groupBy('coa_to');
            }])->orderBy('code', 'ASC');
    }
}
