<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlAnalysis extends Model
{
    public static $statics = [
        'position' => [
            '1' => 'Debet',
            '2' => 'Credit',
        ]
    ];

    public function financialTrans()
    {
        return $this->belongsTo(FinancialTrans::class, 'financial_trans_id', 'id');
    }

    public function coaFrom()
    {
        return $this->belongsTo(Coa::class, 'coa_from', 'id');
    }

    public function coaTo()
    {
        return $this->belongsTo(Coa::class, 'coa_to', 'id');
    }

    public function scopePosition($query, $position)
    {
        return $query->where('position', $position);
    }

    public function getPositionAttribute($value)
    {
        return $this::$statics['position'][$value];
    }

    public function scopeJournal($query)
    {
        return $query->select('financial_trans_id', 'coa_from', 'position', 'financial_trans.created_at')
            ->join('financial_trans', 'financial_trans.id', '=', 'gl_analyses.financial_trans_id')
            ->selectRaw('SUM(value) as value')
            ->groupBy('financial_trans_id', 'coa_from', 'position', 'financial_trans.created_at')
            ->orderBy('financial_trans_id', 'ASC')
            ->orderBy('position', 'ASC');
    }
}
