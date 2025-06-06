<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Enum;

use DddModule\ValueObject\ValueObjectInterface;
use MabeEnum\Enum as BaseEnum;
use MabeEnum\EnumSerializableTrait;

/**
 * Class Enum.
 */
abstract class Enum extends BaseEnum implements ValueObjectInterface
{
    use EnumSerializableTrait;

    /**
     * Returns a new Enum object from passed value matching argument.
     */
    public static function fromNative(): static
    {
        return static::get(func_get_arg(0));
    }

    /**
     * Returns the PHP native value of the enum.
     */
    public function toNative(): mixed
    {
        return $this->getValue();
    }

    /**
     * Tells whether two Enum objects are sameValueAs by comparing their values.
     */
    public function sameValueAs(ValueObjectInterface $enum): bool
    {
        if (!$enum instanceof static) {
            return false;
        }

        return $this->toNative() === $enum->toNative();
    }

    /**
     * Returns a native string representation of the Enum value.
     */
    public function __toString(): string
    {
        return (string)$this->toNative();
    }
}
