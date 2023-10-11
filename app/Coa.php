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
        $collect = $query->selectRaw("id, CONCAT_WS(' ', code, name) as name")->get();
        return $collect->pluck('name', 'id');
    }

    public function scopeTrialBalance($query)
    {
        $position = PositionEnum::class;
        return $query->select('coas.*', 'balance as begining')
            ->join('postings', function (JoinClause $join) {
                $join->on('coas.id', 'postings.coa_id')
                    ->where('postings.period_begin', '201810');
            })
            ->with(['glAnalysis' => function ($analysis) use ($position) {
                $analysis->whereHas('financialTrans', function ($trans) {
                    $trans->where('period_begin', '201811');
                })
                ->select('coa_to')
                ->selectRaw('SUM(CASE WHEN position = ' . $position::DEBET . ' THEN value ELSE 0 END) AS debet')
                ->selectRaw('SUM(CASE WHEN position = ' . $position::CREDIT . ' THEN value ELSE 0 END) AS credit')
                ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coa_to AND postings.period_begin=201810) + SUM(CASE WHEN gl_analyses.position = ' . $position::DEBET . ' THEN gl_analyses.value ELSE gl_analyses.value * -1 END) AS ending')
                ->groupBy('coa_to');
            }])->orderBy('code', 'ASC');
    }
}
