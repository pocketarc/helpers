<?php

/**
 * A PHPUnit test case for Email.
 */
class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testNormalizeEmailAddresses()
    {
        $addresses = ['test@example.com', 'test@example.service', 'invalid@email'];
        $csv_addresses = 'test@example.com, test@example.service,invalid@email';
        $csv_array_addresses = ['test@example.com, test@example.service,invalid@email'];

        self::assertEquals(['test@example.com', 'test@example.service'], \Brunodebarros\Helpers\Email::normalizeEmailAddresses($addresses));
        self::assertEquals(['test@example.com', 'test@example.service'], \Brunodebarros\Helpers\Email::normalizeEmailAddresses($csv_addresses));
        self::assertEquals(['test@example.com', 'test@example.service'], \Brunodebarros\Helpers\Email::normalizeEmailAddresses($csv_array_addresses));
    }
}
