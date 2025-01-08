<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DddModule\ValueObject\DateTime\Minute;
use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;

class MinuteTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeMinute = Minute::fromNative(11);
        $constructedMinute = new Minute(11);

        $this->assertTrue($fromNativeMinute->sameValueAs($constructedMinute));
    }

    public function testNow(): void
    {
        $minute = Minute::now();
        $this->assertEquals(intval(date('i')), $minute->toNative());
    }

    public function testInvalidMinute(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new Minute(60);
    }
}
