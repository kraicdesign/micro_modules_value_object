<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Geography;

use DddModule\ValueObject\Geography\CountryCode;
use DddModule\ValueObject\Geography\CountryCodeName;
use DddModule\ValueObject\StringLiteral\StringLiteral;
use DddModule\ValueObject\Tests\Unit\TestCase;

class CountryCodeNameTest extends TestCase
{
    public function testGetName(): void
    {
        $code = CountryCode::IT();
        $name = CountryCodeName::getName($code);
        $expectedString = new StringLiteral('Italy');

        $this->assertTrue($name->sameValueAs($expectedString));
    }
}
