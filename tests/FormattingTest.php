<?php

/**
 * A PHPUnit test case for Formatting.
 */
class FormattingTest extends PHPUnit_Framework_TestCase
{
    public function testBytes()
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        foreach ($units as $power => $expected_unit) {
            $value = 512 * pow(1024, $power);
            self::assertEquals("512 $expected_unit", \Brunodebarros\Helpers\Formatting::bytes($value, 2));
        }
    }
}
