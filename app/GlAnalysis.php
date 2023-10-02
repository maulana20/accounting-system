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
}
