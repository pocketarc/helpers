<?php

/**
 * A PHPUnit test case for System.
 */
class SystemTest extends PHPUnit_Framework_TestCase
{
    public function testRunLs()
    {
        $outputs = [];

        $result = \Brunodebarros\Helpers\System::run('ls', function ($output) use (&$outputs) {
            $outputs[] = $output;
        }, dirname(__FILE__));

        self::assertTrue(in_array(basename(__FILE__), $outputs));
        self::assertContains(basename(__FILE__), $result['output']);
        self::assertEquals(0, $result['exit_code']);
    }
}
