<?php

namespace App\Services;

class GeneralCashBankFormService
{
    public $form;
    public $listing;

    public function __construct($generalCashBank = null)
    {
        if (is_null($generalCashBank)) {
            $generalCashBank = request()->route()->parameter('generalCashBank');
        }

        $position = $generalCashBank->position == 2 ? 1 : 2;
        $this->listing = $generalCashBank->financialTrans->glAnalysis()->position($position)->get();

        $this->form = new \StdClass;
        $this->form->id = $generalCashBank->id;
        $this->form->period = $generalCashBank->financialTrans->period_begin;
        $this->form->status = $generalCashBank->financialTrans->period->status;
        $this->form->created_at = $generalCashBank->created_at;
        $this->form->position = $generalCashBank->position;
        $this->form->coa_id = $this->listing->first()->coaTo->id;
        $this->form->desc = null;
    }
}