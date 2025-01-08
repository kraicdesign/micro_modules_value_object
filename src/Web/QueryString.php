<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\StringLiteral\StringLiteral;
use DddModule\ValueObject\Structure\Dictionary;

/**
 * Class QueryString.
 */
class QueryString extends StringLiteral implements QueryStringInterface
{
    /**
     * Returns a new QueryString.
     */
    public function __construct(string $value)
    {
        if ($value !== '' && 0 === preg_match('/^\?([\w\.\-[\]~&%+]+(=([\w\.\-~&%+]+)?)?)*$/', $value)) {
            throw new InvalidNativeArgumentException($value, ['string (valid query string)']);
        }

        parent::__construct($value);
    }

    /**
     * Returns a Dictionary structured representation of the query string.
     */
    public function toDictionary(): Dictionary
    {
        $data = [];
        $value = ltrim($this->toNative(), '?');
        parse_str($value, $data);

        return Dictionary::fromNative($data);
    }
}
