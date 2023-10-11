<?php

namespace App\Services;

use App\Enums\PositionEnum;

class GeneralCashBankFormService
{
    public $form;
    public $listing;

    public function __construct($collection = null)
    {
        if (is_null($collection)) $collection = request()->route()->parameter('generalCashBank');

        $this->listing = $collection->financialTrans->glAnalysis()->position(
            $collection->position === PositionEnum::DEBET ? PositionEnum::CREDIT : PositionEnum::DEBET
        )->get();
        $summary = $this->summary($collection);

        $this->form = new \StdClass;
        $this->form->id = $collection->id;
        $this->form->period = $collection->financialTrans->period_begin;
        $this->form->status = $collection->financialTrans->period->status;
        $this->form->created_at = $collection->financialTrans->created_at;
        $this->form->position = $collection->position;
        $this->form->coa_id = $summary['coa_from'];
        $this->form->desc = $summary['desc'];
    }

    public function summary($collection)
    {
        return $collection->financialTrans->glAnalysis()->position($collection->position)->first()->only('coa_from', 'desc');
    }
}