<?php

namespace Modules\ERP\Enum;

enum CarpetType: string
{
    case WAS_BROUGHT = 'was_brought';
    case WASHED = 'washed';
    case PREPARED = 'prepared';
}