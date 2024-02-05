<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\BalanceTrait;

class Coa extends Model
{
    use BalanceTrait;
    
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
}
