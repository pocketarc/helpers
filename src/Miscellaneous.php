<?php

namespace Brunodebarros\Helpers;

/**
 * Miscellaneous helper functions that either don't have a category or have yet to be categorised.
 *
 * @package Brunodebarros\Helpers
 * @author  Bruno De Barros <bruno@terraduo.com>
 */
class Miscellaneous {

    /**
     * Tries to perform an operation multiple times, with a delay between each time.
     * If, after $max_attempts, the operation has not yet completed successfully,
     * it will return the last exception thrown by the callable (or false if no exception was thrown).
     *
     * @param callable $callable
     * @param int      $max_attempts
     * @param int      $delay
     *
     * @return bool|\Exception
     */
    public static function multi_try($callable, $max_attempts = 3, $delay = 100) {
        $attempt = 1;
        $exception = false;

        while ($attempt <= $max_attempts) {
            try {
                if (call_user_func($callable)) {
                    return true;
                }
            } catch (\Exception $e) {
                $success = false;
                $exception = $e;
            }

            usleep($delay);
            $attempt++;
        }

        return $exception;
    }

}