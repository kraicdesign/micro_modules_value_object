<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Web;

use DddModule\ValueObject\Exception\InvalidNativeArgumentException;
use DddModule\ValueObject\Structure\Dictionary;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\Web\NullQueryString;
use DddModule\ValueObject\Web\QueryString;

class QueryStringTest extends TestCase
{
    public function testValidQueryString(): void
    {
        $query = new QueryString('?foo=bar');

        $this->assertInstanceOf('DddModule\ValueObject\Web\QueryString', $query);
    }

    public function testEmptyQueryString(): void
    {
        $query = new NullQueryString();

        $this->assertInstanceOf('DddModule\ValueObject\Web\QueryString', $query);

        $dictionary = $query->toDictionary();
        $this->assertInstanceOf('DddModule\ValueObject\Structure\Dictionary', $dictionary);
    }

    public function testInvalidQueryString(): void
    {
        $this->expectException(InvalidNativeArgumentException::class);
        new QueryString('invalìd');
    }

    public function testToDictionary(): void
    {
        $query = new QueryString('?foo=bar&array[]=one&array[]=two');
        $dictionary = $query->toDictionary();

        $this->assertInstanceOf('DddModule\ValueObject\Structure\Dictionary', $dictionary);

        $array = [
            'foo' => 'bar',
            'array' => [
                'one',
                'two',
            ],
        ];
        $expectedDictionary = Dictionary::fromNative($array);

        $this->assertTrue($expectedDictionary->sameValueAs($dictionary));
    }
}
