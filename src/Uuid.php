<?php

namespace LibRef\Types\Uuid;

interface Uuid
{
    public function __toString(): string;

    public function toString(): string;

    public function toCanonicalString(): string;
}
