<?php

declare(strict_types=1);

namespace DddModule\ValueObject\Web;

use DddModule\ValueObject\Structure\Dictionary;

/**
 * Interface QueryStringInterface.
 */
interface QueryStringInterface
{
    /**
     * Returns Dictionary ValueObject
     */
    public function toDictionary(): Dictionary;
}
