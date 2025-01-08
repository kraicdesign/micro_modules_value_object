<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Geography;

use DddModule\ValueObject\Enum\Enum;

/**
 * Class DistanceUnit.
 */
class DistanceUnit extends Enum
{
    public const FOOT = 'ft';
    public const METER = 'mt';
    public const KILOMETER = 'km';
    public const MILE = 'mi';
}
