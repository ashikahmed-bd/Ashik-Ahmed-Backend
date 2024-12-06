<?php

namespace App\Enums;

enum LicenseType: string
{
    case TRIAL = 'trial';
    case SUBSCRIPTION = 'subscription';
    case LIFETIME = 'lifetime';
}
