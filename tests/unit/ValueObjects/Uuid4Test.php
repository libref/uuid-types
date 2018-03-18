<?php

namespace LibRef\Types\Uuid\Tests\ValueObjects;

use LibRef\Types\Uuid\Exception;
use LibRef\Types\Uuid\Tests\TestCase;
use LibRef\Types\Uuid\Uuid;
use LibRef\Types\Uuid\Uuid4;

class Uuid4Test extends TestCase
{
    private const REGEXP_INVALID_FORMAT_MESSAGE = '/^`.+` is not a valid UUID formatted string$/';

    public function testExistence()
    {
        $this->assertTrue(interface_exists(Uuid::class));
        $this->assertTrue(class_exists(Uuid4::class));
        $this->assertTrue(method_exists(Uuid4::class, 'toString'));
    }

    public function testValidUuid4()
    {
        $input = '34f2d969-885c-49e7-90f9-5ca22e01d7dd';
        $uuid4 = new Uuid4($input);
        $this->assertEquals($input, $uuid4->toString());
        $this->assertEquals($input, (string)$uuid4);
        $this->assertEquals($input, $uuid4->toCanonicalString());
    }

    public function testInvalidUuid4()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(100);
        $this->expectExceptionMessageRegExp(self::REGEXP_INVALID_FORMAT_MESSAGE);
        $input = '34f2d969-885c-49e7-z0f9-5ca22e01d7dd';
        new Uuid4($input);
    }


    public function testValidUuid1()
    {
        $input = '34f2d969-885c-19e7-90f9-5ca22e01d7dd';
        $this->assertException(
            function () use ($input) {
                new Uuid4($input);
            },
            Exception::class
        );
    }
}
