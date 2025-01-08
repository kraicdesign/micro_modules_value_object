<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Climate;

use DddModule\ValueObject\Number\Real;

/**
 * Class Temperature.
 */
abstract class Temperature extends Real
{
    /**
     * Convert to Celsius ValueObject type.
     */
    abstract public function toCelsius(): Celsius;

    /**
     * Convert to Kelvin ValueObject type.
     */
    abstract public function toKelvin(): Kelvin;

    /**
     * Convert to Fahrenheit ValueObject type.
     */
    abstract public function toFahrenheit(): Fahrenheit;
}
