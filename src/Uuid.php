<?php

namespace LibRef\Uuid;

abstract class Uuid
{
    private const PATTERN = '/[a-f0-9]{8}-[a-f0-9]{4}-([1-4])[a-f0-9]{3}-[89aAbB][a-f0-9]{3}-[a-f0-9]{12}/i';
    private const NIL = '/0{8}-(0{4}-){3}0{8}/';

    protected function matchesUuidPattern(Uuid $uuid): bool
    {
        return preg_match(self::PATTERN, $uuid) === 1;
    }

    protected function matchesNilPattern(Uuid $uuid): bool
    {
        return preg_match(self::NIL, $uuid) === 1;
    }

    protected function getVersion(Uuid $uuid) : int
    {
        $versionString = preg_match(self::PATTERN, $uuid, $matches);
        var_dump($versionString, $matches);
    }

    abstract public function __toString() : string;
    abstract public function toString(): string;
    abstract public function toCanonicalString() : string;
}
