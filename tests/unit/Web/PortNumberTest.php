<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\PortNumber;

class PortNumberTest extends TestCase
{
    public function testValidPortNumber(): void
    {
        $port = new PortNumber(80);

        $this->assertInstanceOf('DddModule\ValueObject\Web\PortNumber', $port);
    }

    public function testInvalidPortNumber(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new PortNumber(65536);
    }
}
