<?php

/**
 * A PHPUnit test case for Miscellaneous.
 */
class MiscellaneousTest extends PHPUnit_Framework_TestCase
{
    public function testMultiTrySuccessOnFirstTry()
    {
        $attempts = 0;
        $test = function () use (&$attempts) {
            $attempts = $attempts + 1;

            return true;
        };

        $result = Brunodebarros\Helpers\Miscellaneous::multiTry($test, 3, 100);

        self::assertTrue($result);
        self::assertEquals(1, $attempts);
    }

    public function testMultiTryFailureAfterThreeAttempts()
    {
        $attempts = 0;
        $test = function () use (&$attempts) {
            $attempts = $attempts + 1;
            throw new Exception('Test Exception!', $attempts);
        };

        $result = Brunodebarros\Helpers\Miscellaneous::multiTry($test, 3, 100);

        self::assertInstanceOf('\\Exception', $result);
        self::assertEquals(3, $result->getCode());
        self::assertEquals(3, $attempts);
    }

    public function testMultiTrySuccessAfterExceptions()
    {
        $attempts = 0;
        $test = function () use (&$attempts) {
            $attempts = $attempts + 1;
            if ($attempts < 3) {
                throw new Exception('Test Exception!', $attempts);
            } else {
                return true;
            }
        };

        $result = Brunodebarros\Helpers\Miscellaneous::multiTry($test, 3, 100);

        self::assertTrue($result);
        self::assertEquals(3, $attempts);
    }

    public function testMultiTrySuccessAfterFailures()
    {
        $attempts = 0;
        $test = function () use (&$attempts) {
            $attempts = $attempts + 1;
            if ($attempts < 3) {
                return false;
            } else {
                return true;
            }
        };

        $result = Brunodebarros\Helpers\Miscellaneous::multiTry($test, 3, 100);

        self::assertTrue($result);
        self::assertEquals(3, $attempts);
    }
}
