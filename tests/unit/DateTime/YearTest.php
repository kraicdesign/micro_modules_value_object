<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DddModule\ValueObject\DateTime\Year;
use DddModule\ValueObject\Tests\Unit\TestCase;

class YearTest extends TestCase
{
    public function testNow(): void
    {
        $year = Year::now();
        $this->assertEquals(date('Y'), $year->toNative());
    }
}
