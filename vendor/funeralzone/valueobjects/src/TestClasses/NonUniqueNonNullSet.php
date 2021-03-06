<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjects\TestClasses;

use Funeralzone\ValueObjects\Sets\NonNullSet;

final class NonUniqueNonNullSet extends NonNullSet
{
    protected function typeToEnforce(): string
    {
        return TestValueObject::class;
    }

    public static function valuesShouldBeUnique(): bool
    {
        return false;
    }
}
