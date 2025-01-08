<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\Path;

class PathTest extends TestCase
{
    public function testValidPath(): void
    {
        $pathString = '/path/to/resource.ext';
        $path = new Path($pathString);
        $this->assertEquals($pathString, $path->toNative());
    }

    public function testInvalidPath(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new Path('//valid?');
    }
}
