<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\IPv4Address;

class IPv4AddressTest extends TestCase
{
    public function testValidIPv4Address(): void
    {
        $ip = new IPv4Address('127.0.0.1');

        $this->assertInstanceOf('DddModule\ValueObject\Web\IPv4Address', $ip);
    }

    public function testInvalidIPv4Address(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new IPv4Address('::1');
    }
}
