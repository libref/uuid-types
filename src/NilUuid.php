<?php

declare(strict_types=1);

namespace LibRef\Types\Uuid;

class NilUuid implements Uuid
{
    private const NIL = '00000000-0000-0000-0000-00000000';

    final public function __toString(): string
    {
        return $this->toString();
    }

    final public function toString(): string
    {
        return self::NIL;
    }

    final public function toCanonicalString(): string
    {
        return strtolower($this->toString());
    }
}
