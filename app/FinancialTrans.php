<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialTrans extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_begin', 'begin');
    }

    public function glAnalysis()
    {
        return $this->hasMany(glAnalysis::class);
    }

    public function generalCashBanks()
    {
        return $this->hasMany(GeneralCashBank::class);
    }

    public function interCashBanks()
    {
        return $this->hasMany(InterCashBank::class);
    }
}
