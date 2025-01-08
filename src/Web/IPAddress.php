<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;

/**
 * Class IPAddress.
 */
class IPAddress extends Domain
{
    /**
     * Returns a new IPAddress.
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP);

        if (false === $filteredValue) {
            throw new InvalidNativeArgumentException($value, ['string (valid ip address)']);
        }

        parent::__construct($filteredValue);
    }

    /**
     * Returns the version (IPv4 or IPv6) of the ip address.
     */
    public function getVersion(): IPAddressVersion
    {
        $isIPv4 = filter_var($this->toNative(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if (false !== $isIPv4) {
            return IPAddressVersion::IPV4();
        }

        return IPAddressVersion::IPV6();
    }
}
