<?php

namespace App\Enums;

enum BillStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';

    public function label() : string
    {
        return match ($this) {
            self::UNPAID => __('Unpaid'),
            self::PAID => __('Paid'),
        };
    }

    public function color() : string
    {
        return match ($this) {
            self::PAID => 'text-success',
            self::UNPAID => 'text-danger',
        };
    }
}
