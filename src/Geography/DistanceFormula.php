<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Geography;

use DddModule\ValueObject\Enum\Enum;

/**
 * Class DistanceFormula.
 */
class DistanceFormula extends Enum
{
    public const FLAT = 'flat';
    public const HAVERSINE = 'haversine';
    public const VINCENTY = 'vincenty';
}
