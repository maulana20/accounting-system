<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PeriodEnum;

class Period extends Model
{
    public function financialTrans()
    {
        return $this->hasMany(FinancialTrans::class);
    }

    public function getStatusAttribute($value)
    {
        return PeriodEnum::fromValue($value)->description;
    }
}
