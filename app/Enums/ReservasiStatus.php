<?php

namespace App\Enums;

enum ReservasiStatus: int
{
    case PENDING = 0;
    case SELESAI = 1;
    case DITOLAK = 2;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'pending',
            self::SELESAI => 'selesai',
            self::DITOLAK => 'ditolak',
        };
    }

    public function bgColor(): string
    {
        return match ($this) {
            self::PENDING => 'bg-yellow-500',
            self::SELESAI => 'bg-green-500',
            self::DITOLAK => 'bg-red-500',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::PENDING => 'text-yellow-800',
            self::SELESAI => 'text-green-800',
            self::DITOLAK => 'text-red-800',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PENDING->value => self::PENDING->label(),
            self::SELESAI->value => self::SELESAI->label(),
            self::DITOLAK->value => self::DITOLAK->label(),
        ];
    }
}
