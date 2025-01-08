<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\Domain;

class DomainTest extends TestCase
{
    public function testSpecifyType(): void
    {
        $ip = Domain::specifyType('127.0.0.1');
        $hostname = Domain::specifyType('example.com');

        $this->assertInstanceOf('DddModule\ValueObject\Web\IPAddress', $ip);
        $this->assertInstanceOf('DddModule\ValueObject\Web\Hostname', $hostname);
    }
}
