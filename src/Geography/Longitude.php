<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Geography;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Number\Real;
use League\Geotools\Coordinate\Coordinate as BaseCoordinate;

/**
 * Class Longitude.
 */
class Longitude extends Real
{
    /**
     * Returns a new Longitude object.
     *
     * @throws InvalidNativeArgumentException
     */
    public function __construct(float $value)
    {
        // normalization process through Coordinate object
        $coordinate = new BaseCoordinate([0, $value]);
        $longitude = $coordinate->getLongitude();

        parent::__construct($longitude);
    }
}
