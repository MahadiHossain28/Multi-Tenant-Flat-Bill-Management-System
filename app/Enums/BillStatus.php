<?php

namespace App\Enums;

enum BillStatus: string
{
    case UNPAID = 'unpaid';
    // case PARTIAL = 'partial';
    case PAID = 'paid';

    public function label() : string
    {
        return match ($this) {
            self::UNPAID => __('Unpaid'),
            //self::PARTIAL => __('Partial'),
            self::PAID => __('Paid'),
        };
    }

    public function color() : string
    {
        return match ($this) {
            // self::PARTIAL => 'text-warning-emphasis',
            self::PAID => 'text-success',
            self::UNPAID => 'text-danger',
        };
    }
}
