<?php

use PHPUnit\Framework\TestCase;
use Brunodebarros\Helpers\Email;

/**
 * A PHPUnit test case for Email.
 */
class EmailTest extends TestCase
{
    public function testNormalizeEmailAddresses()
    {
        $addresses = ['test@example.com', 'test@example.service', 'invalid@email'];
        $csv_addresses = 'test@example.com, test@example.service,invalid@email';
        $csv_array_addresses = ['test@example.com, test@example.service,invalid@email'];

        self::assertEquals(['test@example.com', 'test@example.service'], Email::normalizeEmailAddresses($addresses));
        self::assertEquals(['test@example.com', 'test@example.service'], Email::normalizeEmailAddresses($csv_addresses));
        self::assertEquals(['test@example.com', 'test@example.service'], Email::normalizeEmailAddresses($csv_array_addresses));
    }
}
