<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\JournalTrait;

class GlAnalysis extends Model
{
    use JournalTrait;

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

    public function scopeTransInOut($query, $data)
    {
        return $query->whereIn('financial_trans_id', [
                $data->financial_trans_out,
                $data->financial_trans_in
            ])->orderBy('financial_trans_id', 'ASC');
    }
}
