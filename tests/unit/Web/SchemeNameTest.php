<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\SchemeName;

class SchemeNameTest extends TestCase
{
    public function testValidSchemeName(): void
    {
        $scheme = new SchemeName('git+ssh');
        $this->assertInstanceOf('DddModule\ValueObject\Web\SchemeName', $scheme);
    }


    public function testInvalidSchemeName(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new SchemeName('ht*tp');
    }
}
