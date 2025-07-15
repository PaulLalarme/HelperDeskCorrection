<?php
declare(strict_types=1);

namespace App\Enum;  // E majuscule

enum Priority: string
{
    case LOW    = 'Low';
    case MEDIUM = 'Medium';
    case HIGH   = 'High';

    public function badgeClass(): string
    {
        return match ($this) {
            self::HIGH   => 'text-bg-danger',
            self::MEDIUM => 'text-bg-warning',
            self::LOW    => 'text-bg-secondary',
        };
    }
}
