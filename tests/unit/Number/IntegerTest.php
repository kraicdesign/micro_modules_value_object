<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Number;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Number\Integer;
use DddModule\ValueObject\Number\Real;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\ValueObjectInterface;
use TypeError;

class IntegerTest extends TestCase
{
    public function testToNative(): void
    {
        $integer = new Integer(5);
        $this->assertSame(5, $integer->toNative());
    }

    public function testSameValueAs(): void
    {
        $integer1 = new Integer(3);
        $integer2 = new Integer(3);
        $integer3 = new Integer(45);

        $this->assertTrue($integer1->sameValueAs($integer2));
        $this->assertTrue($integer2->sameValueAs($integer1));
        $this->assertFalse($integer1->sameValueAs($integer3));

        $mock = $this->getMockBuilder(ValueObjectInterface::class)->getMock();
        $this->assertFalse($integer1->sameValueAs($mock));
    }

    public function testToString(): void
    {
        $integer = new Integer(87);
        $this->assertSame('87', $integer->__toString());
    }

    public function testInvalidNativeArgument(): void
    {
        $this->expectException(TypeError::class);
        new Integer(23.4);
    }

    public function testInvalidFromNativeArgument(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        Integer::fromNative(23.4);
    }

    public function testZeroToString(): void
    {
        $zero = new Integer(0);
        $this->assertSame('0', $zero->__toString());
    }

    public function testToReal(): void
    {
        $integer = new Integer(5);
        $nativeReal = new Real(5);
        $real = $integer->toReal();

        $this->assertTrue($real->sameValueAs($nativeReal));
    }
}
