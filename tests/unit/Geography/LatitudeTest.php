<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Geography;

use DddModule\ValueObject\Geography\Latitude;
use DddModule\ValueObject\Tests\Unit\TestCase;
use TypeError;

class LatitudeTest extends TestCase
{
    public function testValidLatitude(): void
    {
        $this->assertInstanceOf(Latitude::class, new Latitude(40.829137));
    }

    public function testNormalization(): void
    {
        $latitude = new Latitude(91);
        $this->assertEquals(90, $latitude->toNative());
    }

    public function testInvalidLatitude(): void
    {
        $this->expectException(TypeError::class);

        /** @noinspection PhpStrictTypeCheckingInspection */
        new Latitude('invalid');
    }
}
