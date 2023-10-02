<?php

namespace App\Services;

class InterCashBankFormService
{
    public $form;
    public $listing;

    public function __construct($interCashBank = null)
    {
        if (is_null($interCashBank)) {
            $interCashBank = request()->route()->parameter('interCashBank');
        }

        $this->form = new \StdClass;
        $this->form->id = $interCashBank->id;
        $this->form->period = $interCashBank->financialTransOut->period_begin;
        $this->form->status = $interCashBank->financialTransOut->period->status;
        $this->form->created_at = $interCashBank->created_at;
        $this->form->name = $interCashBank->financialTransOut->user->name;
        $this->form->coa_from = $interCashBank->financialTransOut->glAnalysis()->where('position', 2)->first()->coa_from;
        $this->form->coa_to = $interCashBank->financialTransIn->glAnalysis()->where('position', 1)->first()->coa_from;
        $this->form->value = $interCashBank->financialTransOut->glAnalysis()->where('position', 2)->first()->value;
        $this->form->desc = null;

        $this->listing = $interCashBank->financialTransOut->glAnalysis->concat($interCashBank->financialTransIn->glAnalysis);
    }
}