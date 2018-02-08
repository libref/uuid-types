<?php

declare(strict_types=1);

namespace LibRef\Types\Uuid;

class Exception extends \Exception
{

    final public static function invalidPattern(string $value): self
    {
        $message = sprintf(
            '`%s` is not a valid UUID formatted string',
            $value
        );
        return new self($message, 100);
    }

    final public static function wrongVersion(string $value, int $expectedVersion): self
    {
        $message = sprintf(
            '`%s` is not a valid UUID version %d string',
            $value,
            $expectedVersion
        );
        return new self($message, 200);
    }
}
