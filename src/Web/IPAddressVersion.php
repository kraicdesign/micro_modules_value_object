<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Enum\Enum;

/**
 * Class IPAddressVersion.
 */
class IPAddressVersion extends Enum
{
    public const IPV4 = 'IPv4';
    public const IPV6 = 'IPv6';
}
