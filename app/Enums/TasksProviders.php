<?php

namespace App\Enums;


use App\Enums\Traits\HasEnumHelpers;

/**
 * To do Providers
 */
enum TasksProviders: string
{
    use HasEnumHelpers;

    case PROVIDER1 = 'PROVIDER1';
    case PROVIDER2 = 'PROVIDER2';
}
