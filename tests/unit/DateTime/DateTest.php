<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DateTime;
use DddModule\ValueObject\DateTime\Date;
use DddModule\ValueObject\DateTime\Exception\InvalidDateException;
use DddModule\ValueObject\DateTime\Month;
use DddModule\ValueObject\DateTime\MonthDay;
use DddModule\ValueObject\DateTime\Year;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\ValueObjectInterface;
use Throwable;

class DateTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeDate = Date::fromNative(2013, 'December', 21);
        $constructedDate = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(21));

        $this->assertTrue($fromNativeDate->sameValueAs($constructedDate));
    }

    public function testFromNativeDateTime(): void
    {
        $nativeDate = new DateTime();
        $nativeDate->setDate(2013, 12, 3);
        $dateFromNative = Date::fromNativeDateTime($nativeDate);
        $constructedDate = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));

        $this->assertTrue($dateFromNative->sameValueAs($constructedDate));
    }

    public function testNow(): void
    {
        $date = Date::now();
        $this->assertEquals(date('Y-n-j'), (string)$date);
    }

    public function testAlmostValidDateException(): void
    {
        $this->expectException(Throwable::class);

        new Date(new Year(2013), Month::FEBRUARY(), new MonthDay(31));
    }

    public function testSameValueAs(): void
    {
        $date1 = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $date2 = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $date3 = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(5));

        $this->assertTrue($date1->sameValueAs($date2));
        $this->assertTrue($date2->sameValueAs($date1));
        $this->assertFalse($date1->sameValueAs($date3));

        $mock = $this->getMockBuilder(ValueObjectInterface::class)->getMock();
        $this->assertFalse($date1->sameValueAs($mock));
    }

    public function testGetYear(): void
    {
        $date = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $year = new Year(2013);

        $this->assertTrue($year->sameValueAs($date->getYear()));
    }

    public function testGetMonth(): void
    {
        $date = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $month = Month::DECEMBER();

        $this->assertTrue($month->sameValueAs($date->getMonth()));
    }

    public function testGetDay(): void
    {
        $date = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $day = new MonthDay(3);

        $this->assertTrue($day->sameValueAs($date->getDay()));
    }

    public function testToNativeDateTime(): void
    {
        $date = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $nativeDate = \DateTime::createFromFormat('Y-n-j H:i:s', '2013-12-3 00:00:00');

        $this->assertEquals($nativeDate, $date->toNativeDateTime());
    }

    public function testToString(): void
    {
        $date = new Date(new Year(2013), Month::DECEMBER(), new MonthDay(3));
        $this->assertEquals('2013-12-3', $date->__toString());
    }
}
