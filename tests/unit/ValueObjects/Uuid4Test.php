<?php

namespace LibRef\Types\Uuid\Tests\ValueObjects;

use LibRef\Types\Uuid\Tests\TestCase;
use LibRef\Types\Uuid\Uuid;
use LibRef\Types\Uuid\Uuid4;

class Uuid4Test extends TestCase
{
    public function testExistence()
    {
        $this->assertTrue(class_exists(Uuid::class));
        $this->assertTrue(class_exists(Uuid4::class));
    }
}
