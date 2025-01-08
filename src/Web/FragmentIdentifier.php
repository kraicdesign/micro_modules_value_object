<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\StringLiteral\StringLiteral;

/**
 * Class FragmentIdentifier.
 */
class FragmentIdentifier extends StringLiteral implements FragmentIdentifierInterface
{
    /**
     * Returns a new FragmentIdentifier.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if ($value !== '' && 0 === preg_match('/^#[?%!$&\'()*+,;=a-zA-Z0-9-._~:@\/]*$/', $value)) {
            throw new InvalidNativeArgumentException($value, ['string (valid fragment identifier)']);
        }

        parent::__construct($value ?: '');
    }
}
