<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Structure\Collection;
use InvalidArgumentException;
use SplFixedArray;

class EmailRecipientCollection extends Collection
{
    protected function validateItems(SplFixedArray $items): void
    {
        foreach ($items as $item) {
            if (!($item instanceof EmailRecipient)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Passed SplFixedArray object must contain "EmailRecipient" objects only. "%s" given.',
                        is_object($item) ? get_class($item) : gettype($item)
                    )
                );
            }
        }
    }

    public static function fromNative(): static
    {
        $array = func_get_arg(0);

        if (!is_iterable($array)) {
            throw new InvalidArgumentException('Invalid argument type, expected array.');
        }

        $valueObjects = [];
        foreach ($array as $item) {
            $valueObjects[] = EmailRecipient::fromNative($item[0], $item[1] ?? null);
        }

        return new static(SplFixedArray::fromArray($valueObjects));
    }
}
