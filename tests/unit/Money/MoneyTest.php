<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Tests\Unit\Money;

use DddModule\ValueObject\Money\Currency;
use DddModule\ValueObject\Money\CurrencyCode;
use DddModule\ValueObject\Money\Money;
use DddModule\ValueObject\Number\Integer;
use DddModule\ValueObject\Number\Real;
use DddModule\ValueObject\Tests\Unit\TestCase;
use DddModule\ValueObject\ValueObjectInterface;

class MoneyTest extends TestCase
{
    public function testFromNative(): void
    {
        $fromNativeMoney = Money::fromNative(2100, 'EUR');
        $constructedMoney = new Money(new Integer(2100), new Currency(CurrencyCode::EUR()));

        $this->assertTrue($fromNativeMoney->sameValueAs($constructedMoney));
    }

    public function testSameValueAs(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $usd = new Currency(CurrencyCode::USD());

        $money1 = new Money(new Integer(1200), $eur);
        $money2 = new Money(new Integer(1200), $eur);
        $money3 = new Money(new Integer(34607), $usd);

        $this->assertTrue($money1->sameValueAs($money2));
        $this->assertTrue($money2->sameValueAs($money1));
        $this->assertFalse($money1->sameValueAs($money3));

        $mock = $this->getMockBuilder(ValueObjectInterface::class)->getMock();
        $this->assertFalse($money1->sameValueAs($mock));
    }

    public function testGetAmount(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $amount = $money->getAmount();

        $this->assertInstanceOf(Integer::class, $amount);
        $this->assertSame(1200, $amount->toNative());
    }

    public function testGetCurrency(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $currency = $money->getCurrency();

        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertSame('EUR', $currency->getCode()->toNative());
    }

    public function testAdd(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $addendum = new Integer(156);

        $addedMoney = $money->add($addendum);

        $this->assertEquals(1356, $addedMoney->getAmount()->toNative());
    }

    public function testAddNegative(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $addendum = new Integer(-120);

        $addedMoney = $money->add($addendum);

        $this->assertEquals(1080, $addedMoney->getAmount()->toNative());
    }

    public function testMultiply(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $multiplier = new Real(1.2);

        $addedMoney = $money->multiply($multiplier);

        $this->assertEquals(1440, $addedMoney->getAmount()->toNative());
    }

    public function testMultiplyInverse(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);
        $multiplier = new Real(0.3);

        $addedMoney = $money->multiply($multiplier);

        $this->assertEquals(360, $addedMoney->getAmount()->toNative());
    }

    public function testToString(): void
    {
        $eur = new Currency(CurrencyCode::EUR());
        $money = new Money(new Integer(1200), $eur);

        $this->assertSame('EUR 1200', $money->__toString());
    }
}
