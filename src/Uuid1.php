<?php

declare(strict_types=1);

namespace LibRef\Types\Uuid;

class Uuid1 implements Uuid
{
    private const PATTERN = '/[a-f0-9]{8}-[a-f0-9]{4}-([1-5])[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}/i';

    private const VERSION = 1;

    private $value;

    public function __construct(string $uuid)
    {
        $this->value = $uuid;
        $this->validate($uuid);
    }

    final public function __toString(): string
    {
        return $this->toString();
    }

    final public function toString(): string
    {
        return $this->value;
    }

    final public function toCanonicalString(): string
    {
        return strtolower($this->toString());
    }

    private function validate(string $uuid): void
    {
        if (preg_match(self::PATTERN, $uuid, $matches) !== 1) {
            throw Exception::invalidPattern($uuid);
        }
        $version = (int)$matches[1];
        if ($version !== self::VERSION) {
            throw Exception::wrongVersion($uuid, self::VERSION);
        }
    }
}
