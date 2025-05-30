<?php

declare(strict_types=1);

namespace DddModule\ValueObject\DateTime;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Number\Natural;
use DddModule\ValueObject\ValueObjectInterface;
use DateTime;
use Exception;

/**
 * Class Minute.
 */
class Minute extends Natural
{
    public const MIN_MINUTE = 0;

    public const MAX_MINUTE = 59;

    /**
     * Returns a new Minute from native int value.
     */
    public static function fromNative(): static
    {
        $value = func_get_arg(0);

        return new static($value);
    }

    /**
     * Returns a new Minute object.
     *
     */
    public function __construct(int $value)
    {
        $options = [
            'options' => ['min_range' => self::MIN_MINUTE, 'max_range' => self::MAX_MINUTE],
        ];
        $value = filter_var($value, FILTER_VALIDATE_INT, $options);

        if (false === $value) {
            throw new InvalidNativeArgumentException($value, ['int (>=0, <=59)']);
        }

        parent::__construct($value);
    }

    /**
     * Returns the current minute.
     *
     * @throws Exception
     */
    public static function now(): self
    {
        $now = new DateTime('now');
        $minute = (int) $now->format('i');

        return new static($minute);
    }
}
