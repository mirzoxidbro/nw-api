<?php

namespace Modules\ERP\Enum;

enum CarpetStatus: string
{
    case WAS_BROUGHT = 'was_brought';
    case WASHED = 'washed';
    case PREPARED = 'prepared';
    case SHIPPED = 'shipped';
}