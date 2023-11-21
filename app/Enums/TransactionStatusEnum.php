<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self Fail()
 * @method static self Pending()
 * @method static self Success()
 */

final class TransactionStatusEnum extends Enum
{
    protected static function values(): array{
        return [
            'Fail' => 1,
            'Pending' => 2,
            'Success' => 3,
        ];
    }
}
