<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DddModule\ValueObject\DateTime\MonthDay;
use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;

class MonthDayTest extends TestCase
{
    public function fromNative(): void
    {
        $fromNativeMonthDay = MonthDay::fromNative(15);
        $constructedMonthDay = new MonthDay(15);

        $this->assertTrue($fromNativeMonthDay->sameValueAs($constructedMonthDay));
    }

    public function testNow(): void
    {
        $monthDay = MonthDay::now();
        $this->assertEquals(date('j'), $monthDay->toNative());
    }

    public function testInvalidMonthDay(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new MonthDay(32);
    }
}
