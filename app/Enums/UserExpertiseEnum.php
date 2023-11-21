<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Beginner()
 * @method static self Intermediate()
 * @method static self Expert()
 */
final class UserExpertiseEnum extends Enum
{
    protected static function values(): array{
        return [
            'Beginner' => 1,
            'Intermediate' => 2,
            'Expert' => 3,
        ];
    }
}
