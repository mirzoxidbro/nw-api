<?php

namespace Modules\ERP\Enum;

enum CarpetStatus: string
{
    case RECEIVED = 'received';
    case WASHED = 'washed';
    case PREPARED = 'prepared';
    case SHIPPED = 'shipped';

    public function message(): string
    {
        return match ($this) {
            self::RECEIVED => 'received',
            self::WASHED => 'washed',
            self::PREPARED => 'prepared',
            self::SHIPPED => 'shipped',
            default => 'Undefined',
        };
    }

    public static function getValueByMessage(string $message)
    {
        return match ($message) {
            'received' => self::RECEIVED,
            'washed' => self::WASHED,
            'prepared' => self::PREPARED,
            'shipped' => self::SHIPPED,
            default => 'Undefined',
        };
    }
}