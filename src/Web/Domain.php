<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\StringLiteral\StringLiteral;

/**
 * Class Domain.
 */
abstract class Domain extends StringLiteral
{
    /**
     * Returns a Hostname or a IPAddress object depending on passed value.
     */
    public static function specifyType(string $domain): self
    {
        if (false !== filter_var($domain, FILTER_VALIDATE_IP)) {
            return new IPAddress($domain);
        }

        return new Hostname($domain);
    }
}
