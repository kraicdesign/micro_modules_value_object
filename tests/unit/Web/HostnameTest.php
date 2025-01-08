<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\Hostname;

class HostnameTest extends TestCase
{
    public function testInvalidHostname(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new Hostname('inv@lìd');
    }
}
