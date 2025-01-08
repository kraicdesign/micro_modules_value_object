<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Geography;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Number\Real;
use League\Geotools\Coordinate\Coordinate as BaseCoordinate;

/**
 * Class Latitude.
 */
class Latitude extends Real
{
    /**
     * Returns a new Latitude object.
     *
     * @throws InvalidNativeArgumentException
     */
    public function __construct(float $value)
    {
        // normalization process through Coordinate object
        $coordinate = new BaseCoordinate([$value, 0]);
        $latitude = $coordinate->getLatitude();

        parent::__construct($latitude);
    }
}
