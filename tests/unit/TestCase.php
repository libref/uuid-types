<?php
namespace LibRef\Uuid\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    protected function assertException($test, $expectedException = 'Exception')
    {
        try {
            $test();
        } catch (Exception $e) {
            $this->assertSame($expectedException, get_class($e));
            return;
        }

        $this->assertSame($expectedException, 'No exception thrown');
    }

    protected function assertExceptionInstance($test, $expectedException = 'Exception')
    {
        try {
            $test();
        } catch (Exception $e) {
            $this->assertInstanceOf($expectedException, get_class($e));
            return;
        }

        $this->assertSame($expectedException, 'No exception thrown');
    }

    protected function doesTestSetContainsInstancesOf(array $testSet, $class)
    {
        foreach ($testSet as $test) {
            $this->assertInstanceOf($class, $test);
        }
    }
}
