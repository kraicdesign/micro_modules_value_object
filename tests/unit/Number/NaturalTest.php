<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Number;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Number\Natural;
use DddModule\ValueObject\Tests\Unit\TestCase;

class NaturalTest extends TestCase
{
    public function testInvalidNativeArgument(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);

        new Natural(-2);
    }
}
