<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Water()
 * @method static self Repellent()
 * @method static self Trim()
 * @method static self Fertilize()
 */

final class EventActionEnum extends Enum
{
    protected static function values(): array{
        return [
            'Water' => 1,
            'Repellent' => 2,
            'Trim' => 3,
            'Fertilize'=>4,
        ];
    }
}
