<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Person;

use DddModule\ValueObject\Person\Gender;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\ValueObjectInterface;

class GenderTest extends TestCase
{
    public function testToNative(): void
    {
        $gender = Gender::FEMALE();
        $this->assertEquals(Gender::FEMALE, $gender->toNative());
    }

    public function testSameValueAs(): void
    {
        $male1 = Gender::MALE();
        $male2 = Gender::MALE();
        $other = Gender::OTHER();

        $this->assertTrue($male1->sameValueAs($male2));
        $this->assertTrue($male2->sameValueAs($male1));
        $this->assertFalse($male1->sameValueAs($other));

        $mock = $this->getMockBuilder(ValueObjectInterface::class)->getMock();
        $this->assertFalse($male1->sameValueAs($mock));
    }

    public function testToString(): void
    {
        $sex = Gender::FEMALE();
        $this->assertEquals('female', $sex->__toString());
    }
}
