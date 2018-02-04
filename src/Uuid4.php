<?php

declare(strict_types=1);

namespace LibRef\Types\Uuid;

class Uuid4 implements Uuid
{
    private const PATTERN = '/[a-f0-9]{8}-[a-f0-9]{4}-([1-4])[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}/i';

    private $value;

    public function __construct(string $uuid)
    {
        $this->value = $uuid;
        if (!$this->matchesUuidPattern($this)) {
            throw new \Exception('Not a valid UUID');
        }
        if ($this->getVersion($this) !== 4) {
            throw new \Exception('Not a valid UUID version 4');
        }
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function toCanonicalString(): string
    {
        return strtolower($this->toString());
    }

    protected function matchesUuidPattern(Uuid $uuid): bool
    {
        return preg_match(self::PATTERN, $uuid) === 1;
    }

    protected function getVersion(Uuid $uuid): int
    {
        preg_match(self::PATTERN, $uuid, $matches);
        return (int)$matches[1];
    }
}
