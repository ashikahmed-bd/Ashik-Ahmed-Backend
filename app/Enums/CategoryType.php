<?php

namespace App\Enums;

enum CategoryType: string
{
    case Post = 'post';
    case PROJECT = 'project';

    public static function getValues(): array
    {
        return array_map(fn($type) => $type->value, self::cases());
    }

    public static function getArray (): array
    {
        return array_map(fn($type) => [
            'id' => $type->value,
            'name' => ucfirst($type->value),
        ], self::cases());
    }
}
