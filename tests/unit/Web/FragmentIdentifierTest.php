<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\FragmentIdentifier;
use DddModule\ValueObject\Web\NullFragmentIdentifier;

class FragmentIdentifierTest extends TestCase
{
    public function testValidFragmentIdentifier(): void
    {
        $fragment = new FragmentIdentifier('#id');

        $this->assertInstanceOf('DddModule\ValueObject\Web\FragmentIdentifier', $fragment);
    }

    public function testNullFragmentIdentifier(): void
    {
        $fragment = new NullFragmentIdentifier();

        $this->assertInstanceOf('DddModule\ValueObject\Web\FragmentIdentifier', $fragment);
    }

    public function testInvalidFragmentIdentifier(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new FragmentIdentifier('invalìd');
    }
}
