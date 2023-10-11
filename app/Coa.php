<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    public static $statics = [
        'type' => [
            '1' => 'Aktiva',
            '2' => 'Hutang Usaha',
            '3' => 'Piutang Usaha',
            '4' => 'Pendapatan dan Beban lain lain',
            '5' => 'Biaya Pemasaran',
            '6' => 'Biaya Usaha',
            '7' => 'Kas dan Bank',
            '8' => 'Pembelian',
            '9' => 'PPh Pajak 23',
            '10' => 'PPn Keluaran',
            '11' => 'Passiva',
            '12' => 'Penjualan',
        ]
    ];

    public function groupAccount()
    {
        return $this->belongsTo(groupAccount::class);
    }

    public function posting()
    {
        return $this->belongsTo(Coa::class);
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
        return $query->selectRaw('coas.*, (SELECT balance FROM postings WHERE postings.coa_id=coas.id AND postings.period_begin=201810) as begining')
        ->with(['glAnalysis' => function ($analysis) {
            $analysis->whereHas('financialTrans', function ($trans) {
                $trans->where('period_begin', '201811');
            })
            ->select('coa_to')
            ->selectRaw('SUM(CASE WHEN position = 2 THEN value ELSE 0 END) AS debet')
            ->selectRaw('SUM(CASE WHEN position = 1 THEN value ELSE 0 END) AS credit')
            ->selectRaw('(SELECT balance FROM postings WHERE postings.coa_id=coa_to AND postings.period_begin=201810) + SUM(CASE WHEN gl_analyses.position = 2 THEN gl_analyses.value ELSE gl_analyses.value * -1 END) AS ending')
            ->groupBy('coa_to');
        }])->orderBy('code', 'ASC');
    }
}
