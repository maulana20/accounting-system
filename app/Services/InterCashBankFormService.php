<?php

namespace App\Services;

use App\Enums\PositionEnum;
use App\GlAnalysis;

class InterCashBankFormService
{
    public $form;
    public $listing;

    public function __construct($collection = null)
    {
        if (is_null($collection)) $collection = request()->route()->parameter('interCashBank');

        $this->listing = GlAnalysis::transInOut($collection)->get();
        $summary = $this->summary($collection);

        $this->form = new \StdClass;
        $this->form->id = $collection->id;
        $this->form->period = $collection->financialTransOut->period_begin;
        $this->form->status = $collection->financialTransOut->period->status;
        $this->form->created_at = $collection->financialTransOut->created_at;
        $this->form->name = $collection->financialTransOut->user->name;
        $this->form->coa_from = $summary['coa_from'];
        $this->form->coa_to = $summary['coa_to'];
        $this->form->value = $summary['value'];
        $this->form->desc = $summary['desc'];
    }

    public function summary($collection)
    {
        $trans_out = $this->listing->where('financial_trans_id', $collection->financial_trans_out)
            ->where('position', PositionEnum::CREDIT)->first()->only('coa_from', 'value', 'desc');
        $trans_in = $this->listing->where('financial_trans_id', $collection->financial_trans_in)
            ->where('position', PositionEnum::CREDIT)->first()->only('coa_to');
        return array_merge($trans_out, $trans_in);
    }
}