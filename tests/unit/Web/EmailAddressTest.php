<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\EmailAddress;

class EmailAddressTest extends TestCase
{
    public function testValidEmailAddress(): void
    {
        $email1 = new EmailAddress('foo@bar.com');
        $this->assertInstanceOf('DddModule\ValueObject\Web\EmailAddress', $email1);

        $email2 = new EmailAddress('foo@[120.0.0.1]');
        $this->assertInstanceOf('DddModule\ValueObject\Web\EmailAddress', $email2);
    }

    public function testInvalidEmailAddress(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new EmailAddress('invalid');
    }

    public function testGetLocalPart(): void
    {
        $email = new EmailAddress('foo@bar.baz');
        $localPart = $email->getLocalPart();

        $this->assertEquals('foo', $localPart->toNative());
    }

    public function testGetDomainPart(): void
    {
        $email = new EmailAddress('foo@bar.com');
        $domainPart = $email->getDomainPart();

        $this->assertEquals('bar.com', $domainPart->toNative());
        $this->assertInstanceOf('DddModule\ValueObject\Web\Domain', $domainPart);
    }
}
