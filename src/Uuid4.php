<?php

namespace LibRef\Uuid;

class Uuid4 extends Uuid
{
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
}
