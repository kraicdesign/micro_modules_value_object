<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\DateTime;

use DddModule\ValueObject\DateTime\Second;
use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;

class SecondTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeSecond = Second::fromNative(13);
        $constructedSecond = new Second(13);

        $this->assertTrue($fromNativeSecond->sameValueAs($constructedSecond));
    }

    public function testNow(): void
    {
        $second = Second::now();
        $this->assertEquals(intval(date('s')), $second->toNative());
    }

    public function testInvalidSecond(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new Second(60);
    }
}
