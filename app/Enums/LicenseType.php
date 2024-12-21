<?php

namespace App\Enums;

enum LicenseType: string
{
    case TRIAL = 'trial';
    case SUBSCRIPTION = 'subscription';
    case YEARLY = 'yearly';
    case LIFETIME = 'lifetime';
}
