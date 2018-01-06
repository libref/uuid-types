<?php

namespace LibRef\Uuid\Tests\ValueObjects;

use LibRef\Uuid\Tests\TestCase;
use LibRef\Uuid\Uuid;
use LibRef\Uuid\Uuid4;

class Uuid4Test extends TestCase
{
    public function testExistence()
    {
        $this->assertTrue(class_exists(Uuid::class));
        $this->assertTrue(class_exists(Uuid4::class));
    }
}
