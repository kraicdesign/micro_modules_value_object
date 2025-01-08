<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Util;

use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Util\Util;

class UtilTest extends TestCase
{
    public function testClassEquals(): void
    {
        $util1 = new Util();
        $util2 = new Util();

        $this->assertTrue(Util::classEquals($util1, $util2));
        $this->assertFalse(Util::classEquals($util1, $this));
    }

    public function testGetClassAsString(): void
    {
        $util = new Util();
        $this->assertEquals('DddModule\ValueObject\Util\Util', Util::getClassAsString($util));
    }
}
