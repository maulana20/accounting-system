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

    public function scopeTrialBalance($query, $filter)
    {
        return $query->select('coas.*')
            ->leftJoin('postings', function (JoinClause $join) use ($filter) {
                $period = \Carbon\Carbon::parse($filter['from_date'])->format('Ym');
                $join->on('coas.id', 'postings.coa_id')
                    ->where('postings.period_begin', $period);
            })
            ->with(['glAnalysis' => function ($analysis) use ($filter) {
                $analysis->generalLedger($filter)
                    ->select('coa_to')
                    ->countBalance()
                    ->groupBy('coa_to', 'balance');
            }])->orderBy('code', 'ASC');
    }
}
