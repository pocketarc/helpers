<?php

use PHPUnit\Framework\TestCase;
use Brunodebarros\Helpers\Arrays;

/**
 * A PHPUnit test case for Arrays.
 */
class ArraysTest extends TestCase
{
    public function testReset()
    {
        self::assertEquals(1, Arrays::reset([1, 2, 3]));
    }

    public function testEnd()
    {
        self::assertEquals(3, Arrays::end([1, 2, 3]));
    }
}
