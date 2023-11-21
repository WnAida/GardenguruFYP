<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Seed()
 * @method static self Fertilizer()
 */

final class ProductCategoryEnum extends Enum
{
    protected static function values(): array{
        return [
            'Seed' => 1,
            'Fertilizer' => 2,
        ];
    }
}
