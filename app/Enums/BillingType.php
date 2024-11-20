<?php

namespace App\Enums;

enum BillingType: string
{
    case MONTHLY = 'monthly';
    case ANNUL = 'annual';
}
