<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\StringLiteral;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\StringLiteral\StringLiteral;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\ValueObjectInterface;
use TypeError;

class StringLiteralTest extends TestCase
{
    public function testFromNative(): void
    {
        $string = StringLiteral::fromNative('foo');
        $constructedString = new StringLiteral('foo');

        $this->assertTrue($string->sameValueAs($constructedString));
    }

    public function testToNative(): void
    {
        $string = new StringLiteral('foo');
        $this->assertEquals('foo', $string->toNative());
    }

    public function testSameValueAs(): void
    {
        $foo1 = new StringLiteral('foo');
        $foo2 = new StringLiteral('foo');
        $bar = new StringLiteral('bar');

        $this->assertTrue($foo1->sameValueAs($foo2));
        $this->assertTrue($foo2->sameValueAs($foo1));
        $this->assertFalse($foo1->sameValueAs($bar));

        $mock = $this->getMockBuilder(ValueObjectInterface::class)->getMock();
        $this->assertFalse($foo1->sameValueAs($mock));
    }

    public function testInvalidNativeArgument(): void
    {
        $this->expectException(TypeError::class);
        new StringLiteral(12);
    }

    public function testIsEmpty(): void
    {
        $string = new StringLiteral('');

        $this->assertTrue($string->isEmpty());
    }

    public function testToString(): void
    {
        $foo = new StringLiteral('foo');
        $this->assertEquals('foo', $foo->__toString());
    }
}
