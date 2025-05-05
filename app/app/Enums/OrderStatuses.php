<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum OrderStatuses: string
{
    use EnumToArray;
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
}
