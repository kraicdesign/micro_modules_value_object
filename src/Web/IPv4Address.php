<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;

/**
 * Class IPv4Address.
 */
class IPv4Address extends IPAddress
{
    /**
     * Returns a new IPv4Address.
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if (false === $filteredValue) {
            throw new InvalidNativeArgumentException($value, ['string (valid ipv4 address)']);
        }

        parent::__construct($filteredValue);
    }
}
