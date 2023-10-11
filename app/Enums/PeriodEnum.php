<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class PeriodEnum extends Enum
{
    const OPEN    = 1;
    const POSTING = 2;
    const CLOSE   = 3;
}