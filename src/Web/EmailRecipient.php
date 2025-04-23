<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use BadMethodCallException;
use DddModule\ValueObject\ValueObjectInterface;

class EmailRecipient implements ValueObjectInterface
{
    public function __construct(
        protected EmailAddress $emailAddress,
        protected ?EmailName $emailName = null,
    ) {}

    public static function fromNative(): static
    {
        $args = func_get_args();
        
        if (count($args) === 0) {
            throw new BadMethodCallException('You must pass at least one argument, maximum two 1) EmailAddress 2) EmailName');
        }

        return new static(
            EmailAddress::fromNative($args[0]),
            isset($args[1]) ? EmailName::fromNative($args[1]) : null,
        );
    }

    public function toNative(): array
    {
        return [
            $this->emailAddress->toNative(),
            $this->emailName?->toNative(),
        ];
    }

    public function sameValueAs(ValueObjectInterface $valueObject): bool
    {
        if (!$valueObject instanceof static) {
            return false;
        }

        return $valueObject->getEmailAddress()->sameValueAs($this->getEmailAddress())
            && (
                (null === $valueObject->getEmailName() && null === $this->getEmailName())
                 || $valueObject->getEmailName()->sameValueAs($this->getEmailName())
            );
    }

    public function __toString(): string
    {
        return $this->hasEmailName()
            ? sprintf('%s <%s>', $this->getEmailName()->toNative(), $this->getEmailAddress()->toNative())
            : $this->getEmailAddress()->toNative();
    }

    public function getEmailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }

    public function hasEmailName(): bool
    {
        return null !== $this->emailName;
    }

    public function getEmailName(): ?EmailName
    {
        return $this->emailName;
    }
}
