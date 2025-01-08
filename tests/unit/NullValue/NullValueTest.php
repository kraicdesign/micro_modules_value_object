<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\NullValue;

use BadMethodCallException;
use DddModule\ValueObject\NullValue\NullValue;
use DddModule\ValueObject\Tests\Unit\TestCase;

class NullValueTest extends TestCase
{
    public function testFromNative(): void
    {
        $this->expectException(BadMethodCallException::class);

        NullValue::fromNative();
    }

    public function testSameValueAs(): void
    {
        $null1 = new NullValue();
        $null2 = new NullValue();

        $this->assertTrue($null1->sameValueAs($null2));
    }

    public function testCreate(): void
    {
        $null = NullValue::create();

        $this->assertInstanceOf('DddModule\ValueObject\NullValue\NullValue', $null);
    }

    public function testToString(): void
    {
        $foo = new NullValue();
        $this->assertSame('', $foo->__toString());
    }
}
