<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\IPv6Address;

class IPv6AddressTest extends TestCase
{
    public function testValidIPv6Address(): void
    {
        $ip = new IPv6Address('::1');

        $this->assertInstanceOf('DddModule\ValueObject\Web\IPv6Address', $ip);
    }

    public function testInvalidIPv6Address(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new IPv6Address('127.0.0.1');
    }
}
