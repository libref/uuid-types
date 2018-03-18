<?php

declare(strict_types=1);

namespace LibRef\Types\Uuid;

class Uuid4 implements Uuid
{
    private const PATTERN = '/[a-f0-9]{8}-[a-f0-9]{4}-([1-5])[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}/i';

    private const VERSION = 4;

    /**
     * @var string
     */
    private $value;

    /**
     * Uuid4 constructor.
     * @param string $uuid
     * @throws Exception When the value is not a valid UUID v4 string.
     */
    public function __construct(string $uuid)
    {
        $this->value = $uuid;
        $this->validate($uuid);
    }

    /**
     * @return string
     */
    final public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    final public function toString(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    final public function toCanonicalString(): string
    {
        return strtolower($this->toString());
    }

    /**
     * @param string $uuid
     * @throws Exception
     */
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
