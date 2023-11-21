<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 *@method static self Seedling()
 * @method static self Planted()
 * @method static self Sprout()
 * @method static self Flowering()
 * @method static self Ripening()
 * @method static self Harvested()
 *
 */
final class ScheduleStageEnum extends Enum
{
    protected static function values(): array{
        return [
            'Seedling' => 1,
            'Planted' => 2,
            'Sprout' => 3,
            'Flowering' => 4,
            'Ripening' => 5,
            'Harvested' => 6,
        ];
    }
}
