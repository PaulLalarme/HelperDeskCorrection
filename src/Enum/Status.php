<?php
declare(strict_types=1);

namespace App\Enum;

enum Status: string
{
    case OPEN   = 'Open';
    case CLOSED = 'Closed';

    public function badgeClass(): string
    {
        return match ($this) {
            self::OPEN   => 'text-bg-success',
            self::CLOSED => 'text-bg-light',
        };
    }
}
