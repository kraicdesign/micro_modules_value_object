<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DddModule\ValueObject\DateTime\Hour;
use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;

class HourTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeHour = Hour::fromNative(21);
        $constructedHour = new Hour(21);

        $this->assertTrue($fromNativeHour->sameValueAs($constructedHour));
    }

    public function testNow(): void
    {
        $hour = Hour::now();
        $this->assertEquals(date('G'), $hour->toNative());
    }

    public function testInvalidHour(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new Hour(24);
    }
}
