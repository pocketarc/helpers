<?php

use PHPUnit\Framework\TestCase;
use Brunodebarros\Helpers\System;

/**
 * A PHPUnit test case for System.
 */
class SystemTest extends TestCase
{
    public function testRunLs()
    {
        $outputs = [];

        $result = System::run('ls', function ($output) use (&$outputs) {
            $outputs[] = $output;
        }, __DIR__);

        self::assertContains(basename(__FILE__), $outputs);
        self::assertContains(basename(__FILE__), $result['output']);
        self::assertEquals(0, $result['exit_code']);
    }
}
