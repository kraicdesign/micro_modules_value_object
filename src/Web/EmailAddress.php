<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\StringLiteral\StringLiteral;

/**
 * Class EmailAddress.
 */
class EmailAddress extends StringLiteral
{
    /**
     * Returns an EmailAddress object given a PHP native string as parameter.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_EMAIL);

        if (false === $filteredValue) {
            throw new InvalidNativeArgumentException($value, ['string (valid email address)']);
        }

        parent::__construct($filteredValue);
    }

    /**
     * Returns the local part of the email address.
     */
    public function getLocalPart(): StringLiteral
    {
        $parts = explode('@', $this->toNative());

        return new StringLiteral($parts[0]);
    }

    /**
     * Returns the domain part of the email address.
     */
    public function getDomainPart(): Domain
    {
        $parts = explode('@', $this->toNative());
        $domain = trim($parts[1], '[]');

        return Domain::specifyType($domain);
    }
}
