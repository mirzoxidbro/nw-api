<?php

namespace Modules\ERP\Enum;

enum TransactionPurposeType: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';
    case TRANSFER = 'transfer';

    public function message(): string
    {
        return match ($this) {
            self::INCOME => 'income',
            self::EXPENSE => 'expense',
            self::TRANSFER => 'transfer',
            default => 'Undefined',
        };
    }

    public static function getValueByMessage(string $message)
    {
        return match ($message) {
            'income' => self::INCOME,
            'expense' => self::EXPENSE,
            'transfer' => self::TRANSFER,
            default => 'Undefined',
        };
    }
}