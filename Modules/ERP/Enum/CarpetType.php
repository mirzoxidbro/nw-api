<?php

namespace Modules\ERP\Enum;

enum CarpetType: string
{
    case THIN = 'thin';
    case ORDINARY = 'ordinary';
    case SPECIAL = 'special';


    public function message(): string
    {
        return match ($this) {
            self::THIN => 'thin',
            self::ORDINARY => 'ordinary',
            self::SPECIAL => 'special',
            default => 'Undefined',
        };
    }

    public static function getValueByMessage(string $message)
    {
        return match ($message) {
            'thin' => self::THIN,
            'ordinary' => self::ORDINARY,
            'special' => self::SPECIAL,
            default => 'Undefined',
        };
    }
}