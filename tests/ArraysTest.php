<?php

/**
 * A PHPUnit test case for Arrays.
 */
class ArraysTest extends PHPUnit_Framework_TestCase
{
    public function testReset()
    {
        self::assertEquals(1, \Brunodebarros\Helpers\Arrays::reset([1, 2, 3]));
    }

    public function testEnd()
    {
        self::assertEquals(3, \Brunodebarros\Helpers\Arrays::end([1, 2, 3]));
    }
}
