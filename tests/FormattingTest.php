<?php

use PHPUnit\Framework\TestCase;
use Brunodebarros\Helpers\Formatting;

/**
 * A PHPUnit test case for Formatting.
 */
class FormattingTest extends TestCase
{
    public function testBytes()
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        foreach ($units as $power => $expected_unit) {
            $value = 512 * pow(1024, $power);
            self::assertEquals("512 $expected_unit", Formatting::bytes($value, 2));
        }
    }
}
