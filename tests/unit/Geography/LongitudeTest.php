<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Geography;

use DddModule\ValueObject\Geography\Longitude;
use DddModule\ValueObject\Tests\Unit\TestCase;
use TypeError;

class LongitudeTest extends TestCase
{
    public function testValidLongitude(): void
    {
        $this->assertInstanceOf(Longitude::class, new Longitude(16.555838));
    }

    public function testNormalization(): void
    {
        $longitude = new Longitude(181);
        $this->assertEquals(-179, $longitude->toNative());
    }

    public function testInvalidLongitude(): void
    {
        $this->expectException(TypeError::class);

        /** @noinspection PhpStrictTypeCheckingInspection */
        new Longitude('invalid');
    }
}
