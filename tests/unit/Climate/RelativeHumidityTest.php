<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Climate;

use DddModule\ValueObject\Climate\RelativeHumidity;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Exception\InvalidNativeArgumentException;

class RelativeHumidityTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeRelHum = RelativeHumidity::fromNative(70);
        $constructedRelHum = new RelativeHumidity(70);

        $this->assertTrue($fromNativeRelHum->sameValueAs($constructedRelHum));
    }

    public function testInvalidRelativeHumidity(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new RelativeHumidity(128);
    }
}
