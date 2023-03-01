<?php

namespace Modules\ERP\Enum;

enum PaymentPurposeType: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';
    case TRANSFER = 'transfer';

    public function message(): string
    {
        return match ($this) {
            self::INCOME => 'кг',
            self::EXPENSE => 'метр',
            self::TRANSFER => 'дона',
            default => 'Неизвестно',
        };
    }

    //get value by message
    public static function getValueByMessage(string $message)
    {
        return match ($message) {
            'кг' => self::INCOME,
            'метр' => self::EXPENSE,
            'дона' => self::TRANSFER,
            default => 'Неизвестно',
        };
    }
}